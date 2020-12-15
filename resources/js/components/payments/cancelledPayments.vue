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
                                <strong class="card-title">Cancelled Payments</strong>
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
            fields: ['name', 'amount', 'date',],
            items: [
                {name :'John Doe',amount:'1000', date:'10/12/2020'}
            ]
        }
    }
}
</script>