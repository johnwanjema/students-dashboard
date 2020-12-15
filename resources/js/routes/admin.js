import Example from '../components/ExampleComponent';
// Dashboard
import Dashboard from '../components/Dashboard';

//Students
import RegisteredStudents from '../components/students/registeredStudents.vue';
import UnRegisteredStudents from '../components/students/UnregistredStudents.vue';

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
    // Students
    {
        path: '/admin/registered-students',
        component: RegisteredStudents,
        name: 'RegisteredStudents',
    },
    {
        path: '/admin/unregistered-students',
        component: UnRegisteredStudents,
        name: 'UnRegisteredStudents',
    },
]