<template>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Registered Students</strong>
                            </div>
                            <div class="card-body">
                                <b-table :items="items" :fields="fields"></b-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fields: ['first_name', 'last_name', 'class'],
            items: [
                { class: 5, first_name: 'Dickerson', last_name: 'Macdonald' },
                { class: 2, first_name: 'Larsen', last_name: 'Shaw' },
                { class: 8, first_name: 'Geneva', last_name: 'Wilson' },
                { class: 3, first_name: 'Jami', last_name: 'Carney' }
            ]
        }
    }
}
</script>