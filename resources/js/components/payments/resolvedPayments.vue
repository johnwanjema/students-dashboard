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
                                <strong class="card-title">Resolved Payments</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <label>
                                                Show
                                                <select name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <option value="-1">All</option>
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
            ],
            filter:''
        }
    }
}
</script>