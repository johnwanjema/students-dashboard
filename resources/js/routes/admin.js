import Example from '../components/ExampleComponent';
// Dashboard
import Dashboard from '../components/Dashboard';

//Students
import RegisteredStudents from '../components/students/registeredStudents.vue';
import UnRegisteredStudents from '../components/students/UnregistredStudents.vue';

//payments
import UnResolvedPayments from '../components/payments/unresolvedPayments.vue';
import resolvedPayments from '../components/payments/resolvedPayments.vue';
import cancelledPayments from '../components/payments/cancelledPayments.vue';
import allPayments from '../components/payments/allPayments.vue';


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
    // Payments
    {
        path: '/admin/unresolvedpayments',
        component: UnResolvedPayments,
        name: 'UnResolvedPayments',
    },
    {
        path: '/admin/resolvedpayments',
        component: resolvedPayments,
        name: 'resolvedPayments',
    },
    {
        path: '/admin/cancelledpayments',
        component: cancelledPayments,
        name: 'cancelledPayments',
    },
    {
        path: '/admin/payments',
        component: allPayments,
        name: 'allPayments',
    },
]