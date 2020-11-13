<?php

namespace App\Repositories\Eloquent;

use App\Models\UserPower;
use App\Models\UserSquad;
use App\Models\Vibe;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Illuminate\Contracts\Hashing\Hasher;

/**
 * Class LanguagesRepositoryEloquent
 * @package namespace App\RepositoriesEloquent;
 */
class UsersRepository extends BaseRepository
{
    protected static $getALL = false;

    protected $hasher;

    /**
     * Create a new repository instance.
     *
     * @param  \Illuminate\Contracts\Hashing\Hasher  $hasher
     * @return void
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public static function getCurrent()
    {
        return auth()->user();
    }

    public static function createUser($data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => Role::select('id')->where('key', '=', 'user')->first()->id,
            'token' => md5($data['email'])
        ]);

        $user->unhash_password = $data['password'];

        return $user;
    }

    public static function resetPassword($data)
    {
        $pass = str_random(8);

        $user = User::where('email', $data['email'])->first();

        $user->update(['password' => Hash::make($pass)]);

        $user->unhash_password = $pass;

        return $user;
    }

    public function getUserByCredentials()
    {
        $provider = config('auth.guards.api.provider');
        $model = config('auth.providers.'.$provider.'.model');

        if (is_null($model)) {
            response()->error(
                'Unable to determine authentication model from configuration.',
                500
            );
        }

        $data = request()->all();
        $user = (new $model)->where('email', $data['email'])->first();

        if (!$this->hasher->check($data['password'], $user->getAuthPassword())) {
            response()->error('auth.incorrect_password');
        }

        return $user;
    }

    public static function getUserByPassportToken()
    {
        if(isset($_COOKIE['token'])) {
            $tokenGuard = new \Laravel\Passport\Guards\TokenGuard(
                app()->make(\League\OAuth2\Server\ResourceServer::class),
                \Illuminate\Support\Facades\Auth::createUserProvider('users'),
                app()->make(\Laravel\Passport\TokenRepository::class),
                app()->make(\Laravel\Passport\ClientRepository::class),
                app()->make('encrypter')
            );

            $request = \Illuminate\Http\Request::create('/');
            $request->headers->set('Authorization', 'Bearer ' . $_COOKIE['token']);

            return $tokenGuard->user($request);
        }

        return false;
    }

    public static function getPowers($userId)
    {
        return UserPower::select('p.id', 'p.name', 'p.image')
            ->where('user_powers.user_id', $userId)
            ->whereNotNull('p.id')
            ->leftJoin('powers as p', 'p.id', '=', 'user_powers.power_id')
            ->groupBy('p.id')
            ->get();
    }

    public static function getVibesAllFriends()
    {
        return Vibe::select('vibes.*')
            ->whereIn(
                'vibes.user_id',
                UserSquad::select('squad_id')->where('user_id', auth('api')->user()->id)->get()->pluck('squad_id')
            )
            ->orderBy('created_at', 'DESC')
            ->with('author')
            ->paginate(request()->get('limit', 10));
    }
}
