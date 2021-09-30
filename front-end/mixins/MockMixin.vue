<script>
export default {
  name: "MockMixin",
  data() {
    return {
      userProfile: {
        avatar: 'image/avatar1.svg',
        full_name: 'Кристина Емец',
      },
      pages: [
        {
          title: 'Главная',
          link: ''
        },
        {
          title: 'Контакты',
          link: 'contacts'
        },
        {
          title: 'Доставка и оплата',
          link: 'order_info'
        },
        {
          title: 'Отзывы',
          link: 'reviews'
        },
      ],
      bannerSlides: [
        {
          title: 'Lorem ipsum dolor sit amet',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          background: 'image/test.png'
        },
        {
          title: 'Lorem ipsum dolor sit amet',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          background: 'image/test2.jpg'
        },
        {
          title: 'Lorem ipsum dolor sit amet',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          background: 'image/banner-bg-1.svg'
        },
        {
          title: 'Lorem ipsum dolor sit amet',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          background: 'image/banner-bg-2.svg'
        },
      ],
      navCategory: [
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'химия_для_дома'
        },
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'химия_для_дома'
        },
        {
          icon: 'icons/category2.svg',
          title: 'Агрохимия',
          link: 'агрохимия'
        },
        {
          icon: 'icons/category3.svg',
          title: 'Техническая химия',
          link: 'техническая_химия'
        },
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'химия_для_дома'
        },
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'химия_для_дома'
        },
        {
          icon: 'icons/category2.svg',
          title: 'Агрохимия',
          link: 'агрохимия'
        },
        {
          icon: 'icons/category3.svg',
          title: 'Техническая химия',
          link: 'техническая_химия'
        },
      ],
      categoryGroups: [
        {
          icon: 'icons/group1.svg',
          title: 'Моющие и чистящие средства',
          link: 'моющие_и_чистящие_средства'
        },
        {
          icon: 'icons/group2.svg',
          title: 'Дезинфицирующие средства',
          link: 'дезинфицирующие_средства'
        },
        {
          icon: 'icons/group3.svg',
          title: 'Средства для кухни',
          link: 'средства_для_кухни'
        },
        {
          icon: 'icons/group4.svg',
          title: 'Уход за домом',
          link: 'уход_за_домом'
        },
        {
          icon: 'icons/group1.svg',
          title: 'Моющие и чистящие средства',
          link: 'моющие_и_чистящие_средства'
        },
        {
          icon: 'icons/group2.svg',
          title: 'Дезинфицирующие средства',
          link: 'дезинфицирующие_средства'
        },
        {
          icon: 'icons/group3.svg',
          title: 'Средства для кухни',
          link: 'средства_для_кухни'
        },
        {
          icon: 'icons/group4.svg',
          title: 'Уход за домом',
          link: 'уход_за_домом'
        },
        {
          icon: 'icons/group1.svg',
          title: 'Моющие и чистящие средства',
          link: 'моющие_и_чистящие_средства'
        },
      ],
      benefits: [
        {
          title: 'Lorem ipsum',
          content: 'Donec dui nisi, euismod vel mi eget, fringilla \n' +
            'ullamcorper est. Proin aliquam tincidunt tellus, \n' +
            'at volutpat diam varius nec. ',
          icon: 'image/Benefits1.svg'
        },
        {
          title: 'Lorem ipsum',
          content: 'Donec dui nisi, euismod vel mi eget, fringilla \n' +
            'ullamcorper est. Proin aliquam tincidunt tellus, \n' +
            'at volutpat diam varius nec. ',
          icon: 'image/Benefits2.svg'
        },
        {
          title: 'Lorem ipsum',
          content: 'Donec dui nisi, euismod vel mi eget, fringilla \n' +
            'ullamcorper est. Proin aliquam tincidunt tellus, \n' +
            'at volutpat diam varius nec. ',
          icon: 'image/Benefits3.svg'
        },
      ],
      popularProducts: [
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          category: 'химия_для_дома',
          group: 'моющие_и_чистящие_средства',
          product: 'сода_пищевая',
          available: true,
          price: {
            value: 1,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          category: 'химия_для_дома',
          group: 'моющие_и_чистящие_средства',
          product: 'сода_пищевая',
          available: false,
          price: {
            value: 11,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          category: 'химия_для_дома',
          group: 'моющие_и_чистящие_средства',
          product: 'сода_пищевая',
          available: true,
          price: {
            value: 111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          category: 'химия_для_дома',
          group: 'моющие_и_чистящие_средства',
          product: 'сода_пищевая',
          available: false,
          price: {
            value: 1111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          category: 'химия_для_дома',
          group: 'моющие_и_чистящие_средства',
          product: 'сода_пищевая',
          available: true,
          price: {
            value: 11111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          category: 'химия_для_дома',
          group: 'моющие_и_чистящие_средства',
          product: 'сода_пищевая',
          available: true,
          price: {
            value: 777,
            currency: '₴',
            weight: '500 г'
          }
        },
      ],
      reviews: [
        {
          avatar: 'image/avatar1.svg',
          full_name: 'Кристина Емец',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar2.svg',
          full_name: 'Евгений Проценко',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar3.svg',
          full_name: 'Валерия Зайцева',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar1.svg',
          full_name: 'Кристина Емец',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar1.svg',
          full_name: 'Кристина Емец',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar2.svg',
          full_name: 'Евгений Проценко',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar3.svg',
          full_name: 'Валерия Зайцева',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar1.svg',
          full_name: 'Кристина Емец',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar1.svg',
          full_name: 'Кристина Емец',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar2.svg',
          full_name: 'Евгений Проценко',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar3.svg',
          full_name: 'Валерия Зайцева',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
        {
          avatar: 'image/avatar1.svg',
          full_name: 'Кристина Емец',
          stars: 4,
          title: 'Lorem ipsum',
          content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
          date: new Date,
        },
      ],
      categoryProducts: [
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 1,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: false,
          price: {
            value: 11,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: false,
          price: {
            value: 1111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 11111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 777,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 1,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: false,
          price: {
            value: 11,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: false,
          price: {
            value: 1111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 11111,
            currency: '₴',
            weight: '500 г'
          }
        },
        {
          image: 'image/popularProduct.svg',
          title: 'СОДА ПИЩЕВАЯ',
          link: 'сода_пищевая',
          type: 'Оптом и в розницу',
          available: true,
          price: {
            value: 777,
            currency: '₴',
            weight: '500 г'
          }
        },
      ],
      contacts: {
        numbers: [
          '+38 (099) 000 00 00',
          '+38 (099) 000 00 00',
          '+38 (099) 000 00 00',
        ],
        address: 'Харьков, ул Пушкинская, 10',
        working_time: 'пн-вс 09:00 - 18:00',
      },
      order_info: {
        delivery_content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n' +
          'Imperdiet lectus vestibulum sit cum id molestie purus at mattis. Integer pellentesque faucibus lacinia lorem lorem. \n' +
          'Sed egestas egestas mauris mi tristique facilisi purus. Cursus aliquet purus amet suscipit at eu lorem tristique. Faucibus urna, semper  gravida at laoreet suspendisse amet, quam eget. Nisi ridiculus quam ipsum eu sit molestie pellentesque. In praesent  venenatis pharetra ullamcorper fermentum, dictum. Ipsum penatibus volutpat metus, ac tortor risus. Libero, cras maecenas turpis nam ac.',
        payment_content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n' +
          'Imperdiet lectus vestibulum sit cum id molestie purus at mattis. Integer pellentesque faucibus lacinia lorem lorem. \n' +
          'Sed egestas egestas mauris mi tristique facilisi purus. Cursus aliquet purus amet suscipit at eu lorem tristique. Faucibus urna, semper  gravida at laoreet suspendisse amet, quam eget. Nisi ridiculus quam ipsum eu sit molestie pellentesque. In praesent  venenatis pharetra ullamcorper fermentum, dictum. Ipsum penatibus volutpat metus, ac tortor risus. Libero, cras maecenas turpis nam ac.',
      },
      productCard: {
        image: 'image/product-image.svg',
        title: 'СОДА ПИЩЕВАЯ',
        link: 'сода_пищевая',
        type: 'Оптом и в розницу',
        category: 'химия_для_дома',
        group: 'моющие_и_чистящие_средства',
        product: 'сода_пищевая',
        available: true,
        price: [
          {
            value: 10,
            currency: '₴',
            weight: '500 г'
          },
          {
            value: 20,
            currency: '₴',
            weight: '1 кг'
          },
          {
            value: 100,
            currency: '₴',
            weight: '5 кг'
          }
        ],
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla integer porttitor at mi enim pellentesque nunc. Sit velit sodales in tempor, nunc vestibulum. Bibendum nec nec cursus morbi. Lacus, pretium quisque imperdiet id accumsan augue eget. Elementum feugiat nec eu viverra etiam diam fusce. Facilisi adipiscing dolor fames dictumst sit sollicitudin volutpat at. Elit bibendum dui eu ornare. Iaculis tellus tellus neque at augue. Magna sed lorem parturient euismod velit, dolor ut posuere.',
        usage: [
          'Экологически чистое средство для мытья посуды с легкостью отмывает жир...',
          'Легко отмывает пригоревший жир сосковороды, кастрюли. При кипячении ',
          'Чистит и дезинфицирует ванну, раковинну, кафель. Гипоалергенное средство ...',
          'Отбеливает зубы, снимает налет, освежает дыхание...',
          'Чистит ювелирные изделия, столовое серебро...',
          'Используеться в качестве разрыхлителя привыпечке. Кроме того ...',
          'Усиливает действие стирального порошка, смягчает воду..',
          'Чистит мягкую мебель и ковры...',
        ],
        reviews: [
          {
            avatar: 'image/avatar1.svg',
            full_name: 'Кристина Емец',
            stars: 4,
            title: 'Lorem ipsum',
            content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
            date: new Date,
          },
          {
            avatar: 'image/avatar1.svg',
            full_name: 'Кристина Емец',
            stars: 4,
            title: 'Lorem ipsum',
            content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
            date: new Date,
          },
          {
            avatar: 'image/avatar1.svg',
            full_name: 'Кристина Емец',
            stars: 4,
            title: 'Lorem ipsum',
            content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
            date: new Date,
          },
          {
            avatar: 'image/avatar1.svg',
            full_name: 'Кристина Емец',
            stars: 4,
            title: 'Lorem ipsum',
            content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
            date: new Date,
          },
          {
            avatar: 'image/avatar1.svg',
            full_name: 'Кристина Емец',
            stars: 4,
            title: 'Lorem ipsum',
            content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
            date: new Date,
          },
          {
            avatar: 'image/avatar1.svg',
            full_name: 'Кристина Емец',
            stars: 4,
            title: 'Lorem ipsum',
            content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo est sed vitae molestie velit aenean nisl. Lorem egestas fermentum mattis etiam. Lorem urna enim sed integer vel est. Velit faucibus vestibulum massa feugiat tincidunt viverra lobortis magna. Velit faucibus vestibulum massa. Velit faucibus vestibulum massa.',
            date: new Date,
          },
        ]
      },
    }
  }
}
</script>
