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
                                <strong class="card-title">Unresloved Payments</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <label>
                                                Show
                                                <select v-model="perPage" name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <!-- <option value="-1">All</option> -->
                                                </select>
                                                entries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <b-input-group >
                                            <b-form-input id="filter-input" v-model="filter" type="search" placeholder="Type to Search"></b-form-input>
                                            <b-input-group-append>
                                                <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                                            </b-input-group-append>
                                        </b-input-group>
                                    </div>
                                    <!-- <div class="col-sm-12 col-md-6"><br>
                                        <b-button size="sm">Small Button</b-button>
                                        <b-button size="sm">Small Button</b-button>
                                        <b-button size="sm">Small Button</b-button>
                                    </div> -->
                                </div><br>
                                <b-table :items="items" :per-page="perPage" :current-page="currentPage" :fields="fields" :filter="filter" show-empty @filtered="onFiltered"></b-table>
                                <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" aria-controls="my-table"></b-pagination>
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
            fields: ['name', 'amount', 'date', ],
            items: [
                { name: 'John Doe', amount: '1000', date: '10/12/2020' }
            ],
            perPage: 5,
            currentPage: 1,
            filter: null,
            totalRows: 1,
        }
    },
    computed: {
        rows() {
            return this.items.length
        }
    },
    methods: {
        onFiltered(filteredItems) {
            this.totalRows = filteredItems.length
            this.currentPage = 1
        }
    },
    mounted() {
        this.totalRows = this.items.length
    },
}
</script>
