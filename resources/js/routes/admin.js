import Example from '../components/ExampleComponent';
// Dashboard
import Dashboard from '../components/Dashboard';

//Students
import RegisteredStudents from '../components/students/registeredStudents';
import UnRegisteredStudents from '../components/students/UnregistredStudents';

//payments
import UnResolvedPayments from '../components/payments/unresolvedPayments';
import resolvedPayments from '../components/payments/resolvedPayments';
import cancelledPayments from '../components/payments/cancelledPayments';
import allPayments from '../components/payments/allPayments';

//Reports
import paidStudents from '../components/reports/paidPayments';
import notPaidStudents from '../components/reports/studentsNotPaid';

// Config
import smsReminders from '../components/config/smsReminders';
import userAdmins from '../components/config/usersAdmin';


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
    // Reports
    {
        path: '/admin/paidStudents',
        component: paidStudents,
        name: 'paidStudents',
    },
    {
        path: '/admin/notpaidstudents',
        component: notPaidStudents,
        name: 'notPaidStudents',
    },
    // Config
    {
        path: '/admin/sms',
        component: smsReminders,
        name: 'smsReminders',
    },
    {
        path: '/admin/useradmins',
        component: userAdmins,
        name: 'userAdmins',
    },
]