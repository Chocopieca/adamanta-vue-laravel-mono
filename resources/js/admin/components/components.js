import AdminShowComponent from './AdminShowComponent';
import HeaderBooks from './header/Books';
import FooterBooks from './footer/Books';
import HeaderGenres from './header/Genres';
import FooterGenres from './footer/Genres';
import HeaderAuthors from './header/Authors';
import FooterAuthors from './footer/Authors';
import Sidebar from './sidebar/Sidebar';

import CustomModal from './modals/CustomModal';

Nova.booting(function(Vue, router){
    Vue.component('admin-show-component', AdminShowComponent)
    Vue.component('header-books', HeaderBooks)
    Vue.component('footer-books', FooterBooks)
    Vue.component('header-genres', HeaderGenres)
    Vue.component('footer-genres', FooterGenres)
    Vue.component('header-authors', HeaderAuthors)
    Vue.component('footer-authors', FooterAuthors)
    Vue.component('sidebar', Sidebar)

    Vue.component('custom-modal', CustomModal);
});
