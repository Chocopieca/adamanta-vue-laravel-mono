<script>
export default {
  name: "MockMixin",
  data() {
    return {
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
          link: 'category/khimiya_dlya_doma'
        },
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'category/khimiya_dlya_doma'
        },
        {
          icon: 'icons/category2.svg',
          title: 'Агрохимия',
          link: 'category/agrokhimiya'
        },
        {
          icon: 'icons/category3.svg',
          title: 'Техническая химия',
          link: 'category/tekhnicheskaya_khimiya'
        },
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'category/khimiya_dlya_doma'
        },
        {
          icon: 'icons/category1.svg',
          title: 'Химия для дома',
          link: 'category/khimiya_dlya_doma'
        },
        {
          icon: 'icons/category2.svg',
          title: 'Агрохимия',
          link: 'category/agrokhimiya'
        },
        {
          icon: 'icons/category3.svg',
          title: 'Техническая химия',
          link: 'category/tekhnicheskaya_khimiya'
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
      ]
    }
  }
}
</script>
