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
                                        <strong class="card-title text-light">Cancelled Payments</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <button @click="openModal" type="button" class="btn btn-primary">Add Payment</button>
                                    </div>
                                </div>
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
                                        <b-input-group>
                                            <b-form-input id="filter-input" v-model="filter" type="search" placeholder="Type to Search"></b-form-input>
                                            <b-input-group-append>
                                                <b-button variant="dark" :disabled="!filter" @click="filter = ''">Clear</b-button>
                                            </b-input-group-append>
                                        </b-input-group>
                                        <br/>
                                        <b-button size="sm">Copy</b-button>
                                        <b-button size="sm">Excel</b-button>
                                        <b-button size="sm">CSV</b-button>
                                        <b-button size="sm">PDF</b-button>
                                    </div>
                                </div><br>
                                <b-table bordered :items="items" :per-page="perPage" :current-page="currentPage" :fields="fields" :filter="filter" show-empty @filtered="onFiltered">
                                    <template v-slot:cell(actions)="row">
                                        <b-button class="btn btn-sm" variant="success" @click="openEditModal(row.item)">
                                            Edit
                                        </b-button>
                                        &nbsp;
                                        <b-button class="btn btn-sm" variant="danger">
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
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 v-if="!editMode" class="modal-title" id="mediumModalLabel">Add Payment</h5>
                        <h5 v-else class="modal-title" id="mediumModalLabel">Update Payment</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="company" class="form-control-label">Name:</label>
                            <input v-model="form.first_name" type="text" id="company" placeholder="Enter student name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label  class="form-control-label">Amount:</label>
                            <input v-model="form.amount" type="text" placeholder="Enter amount" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label  class="form-control-label">Date:</label>
                            <input v-model="form.date" type="date" placeholder="Enter payment date" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button v-if="!editMode" type="button" class="btn btn-primary">Add Payment</button>
                        <button v-else type="button" class="btn btn-primary">Update Payment</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $ from 'jquery';
export default {
    data() {
        return {
            fields: ['#','name', 'amount', 'date','actions'],
            items: [
                {name :'John Doe',amount:'1000', date:'10/12/2020'}
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
        },
        openModal(){
            $('#mediumModal').modal('show');
            this.editMode = false;
        },
        openEditModal(student){
            $('#mediumModal').modal('show');
            this.editMode = true;
        }
    },
    mounted() {
        this.totalRows = this.items.length
    },
}
</script>
