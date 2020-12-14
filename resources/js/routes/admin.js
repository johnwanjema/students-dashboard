import Example from '../components/ExampleComponent';
import Dashboard from '../components/Dashboard';
// Dashboard

export default [
    {
        path:'/admin',
        redirect:'/admin/dashboard'
    },
    {
        path: '/admin/example',
        component: Example,
        name: 'Example',
    },
    {
        path: '/admin/dashboard',
        component: Dashboard,
        name: 'Dashboard',
    },
]