import Home from './components/Home';
import About from './components/About';
import Notifications from './components/Notifications';
import Profile from './components/Profile';
import PageNotFound from './components/PageNotFound';

export default {
    mode: 'history',

    linkActiveClass: 'font-bold',

    routes: [
        {
            path: '*',
            component: PageNotFound
        },
        {
            path: '/',
            component: Home
        },
        {
            path: '/about',
            component: About,
        },
        {
            path: '/notifications',
            component: Notifications,
        },
        {
            path: '/profile',
            component: Profile,
        }
    ]
};
