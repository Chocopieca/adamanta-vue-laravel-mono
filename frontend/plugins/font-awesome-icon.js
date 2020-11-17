import { faThLarge } from '@fortawesome/free-solid-svg-icons/faThLarge';
import { faUserCircle } from '@fortawesome/free-solid-svg-icons/faUserCircle';
import { faEdit } from '@fortawesome/free-solid-svg-icons/faEdit';
import { faImages } from '@fortawesome/free-solid-svg-icons/faImages';
import { faIdCard } from '@fortawesome/free-solid-svg-icons/faIdCard';
import { faEye } from '@fortawesome/free-solid-svg-icons/faEye';
import { faEyeSlash } from '@fortawesome/free-solid-svg-icons/faEyeSlash';
import { faThList } from '@fortawesome/free-solid-svg-icons/faThList';
import { faBars } from '@fortawesome/free-solid-svg-icons/faBars';
import { faColumns } from '@fortawesome/free-solid-svg-icons/faColumns';
import { faTh } from '@fortawesome/free-solid-svg-icons/faTh';
import { faFilter } from '@fortawesome/free-solid-svg-icons/faFilter';

import { faFacebook, faInstagram, faVk, faTwitter, faTelegram, faPinterest, faLinkedin} from '@fortawesome/free-brands-svg-icons'

import { library } from '@fortawesome/fontawesome-svg-core';
library.add(
    faThLarge,
    faUserCircle,
    faEdit,
    faImages,
    faIdCard,
    faEye,
    faEyeSlash,
    faThList,
    faBars,
    faColumns,
    faTh,

    faFacebook,
    faInstagram,
    faVk,
    faTwitter,
    faTelegram,
    faPinterest,
    faLinkedin,
    faFilter
);

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import Vue from 'vue';
Vue.component('fa-icon', FontAwesomeIcon);