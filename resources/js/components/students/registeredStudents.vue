<template>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong class="card-title text-light">Registered Students</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary">Add Student</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <label>Show
                                                <select v-model="perPage" name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm">
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <!-- <option value="-1">All</option> -->
                                                </select>entries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <b-input-group>
                                            <b-form-input id="filter-input" v-model="filter" type="search" placeholder="Type to Search"></b-form-input>
                                            <b-input-group-append>
                                                <b-button variant="dark" :disabled="!filter" @click="filter = ''">Clear</b-button>
                                            </b-input-group-append>
                                        </b-input-group>
                                    </div>
                                    <!-- <div class="col-sm-12 col-md-6"><br>
                                        <b-button size="sm">Small Button</b-button>
                                        <b-button size="sm">Small Button</b-button>
                                        <b-button size="sm">Small Button</b-button>
                                    </div> -->  
                                </div><br>
                                <b-table bordered :items="items" :per-page="perPage" :current-page="currentPage" :fields="fields" :filter="filter" show-empty @filtered="onFiltered">
                                    <template v-slot:cell(actions)="row">
                                        <b-button class="btn btn-sm" variant="success" >
                                            Edit
                                        </b-button> &nbsp;
                                        <b-button class="btn btn-sm" variant="danger" >
                                            Delete
                                        </b-button>
                                    </template>
                                    <template v-slot:cell(#)="row">
                                        <p>{{row.index + 1}}</p>
                                    </template>
                                </b-table>
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
            fields: ['#','first_name', 'last_name', 'class','actions'],
            items: [
                { class: 5, first_name: 'Dickerson', last_name: 'Macdonald' },
                { class: 2, first_name: 'Larsen', last_name: 'Shaw' },
                { class: 8, first_name: 'Geneva', last_name: 'Wilson' },
                { class: 3, first_name: 'Jami', last_name: 'Carney' }
            ],
            filter: '',
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