<template>
    <div class=" my-3">
        
        <h1 class="text-center mb-3">Demo#2</h1>

        <div class="mb-2 d-flex justify-content-between align-items-center my-2 p-3 rounded" id="searchRow">
            <a class="btn btn-info shadow ms-5"> 
                <router-link :to="{name: 'demoadmin.index'}" class="text-black">админ</router-link>
            </a>
            
            <div class="d-flex me-5">
                <button @click="showData()" class="btn btn-secondary me-3" type="button" >
                    Показать всё
                </button>
                <form class="d-flex justify-content-center">
                    <input name="equipment" v-model="searchType.equipment" class="form-control me-2" type="search" placeholder="Поиск..." aria-label="Search">
                    <button @click="search()" class="btn btn-outline-secondary my-2 my-sm-0" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>  

        <div class="my-4">
            <h5 class="text-center">Таблица типов оборудования</h5>
            <div class="mt-3 mb-1 d-flex justify-content-center ">
                <table class="border rounded border-shadow mb-1" style="min-width:500px;">
                    <tr>
                        <th class="bg-secondary text-white border p-2" style="min-width:40px;">id</th>
                        <th class="bg-secondary text-white border p-2" style="min-width:100px;">тип оборудования</th>
                        <th class="bg-secondary text-white border p-2" style="min-width:100px;">маска</th>
                    </tr>
                    <tr v-for="(value, index) in types.equipment" :key="index" class="p-2 border">
                        <td class="text-secondary border p-2" style="max-width:40px;">{{ value.id }}</td>
                        <td class="text-secondary border p-2" style="max-width:300px;word-wrap: break-word;">{{ value.equipment }}</td>
                        <td class="text-secondary border p-2" style="max-width:300px;word-wrap: break-word;">{{ value.mask }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                <div v-for="( pag, index ) in paginations" :key="index" class="mx-1"> 
                    <button @click="paginateClick(pag.url)" type="button"  :class="[pag.active ? 'active' : 'pagination-item']" v-html="pag.label" :value="pag.active" ></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Demo',
        data() {
            return {
                imgPath: 'images/',
                types: [],
                mapped: '',
                currentPage:'',
                links: [],
                labels: [],
                paginations: [],
                types: [],
                isActive: false,
                isCreated: false,// display success result of creating 
                isFailed: false, // display failed result of creating
                isDeleted: false, // display success deleting equipment 
                errorCreateResult: '',// info content
                errorDeleteResult: '',
                token:'',
                resultOfRequest: '',
                searchType: {
                    equipment: '',
                },
                formData: {
                    email: '',
                    password: ''
                },
                editData: {
                    id:'',
                    equipment: '',
                    serial_number:'',
                    comment:''
                },
                createData: {
                    equipment: '',
                    serial_number:'',
                    comment:''
                }
            }
        },
        methods: {
            showData(){ 
                // remove search result "Nothing found"
                this.clearInfo()
                axios.get('/public/api/equipment-type')
                    .then(response=>{
                        this.types = response.data
                        this.setPagination()
                    })
                    .catch(err => console.log(err.response.data))
            },
            setPagination() {
                this.paginations.length = 0;// set to 0 befor add new array
                for (let i = 0; i < this.types.meta.links.length; i++) {
                    let p = this.types.meta.links[i]
                    this.paginations.push(p)
                }
            },
            changeUrl(url) {
                return url.replace(/\?page=/g, "/")
            },
            deleting(id) {
                axios.delete('/public/api/equipment/'+id)
                    .then(response=>{
                        console.log('delete response: ' + response.data.message);
                        this.isDeleted = true
                        this.errorDeleteResult = "Equipment was deleted"
                        this.showData()
                    })
                    .catch(err => {
                        if (err.response.data.message == "Unauthenticated.") {
                            this.isDeleted = true
                            this.errorDeleteResult = "You are not authorized"
                        }
                    console.log(err.response.data)})
            },
            editEquipment(){
                // remove delete info (if exist)
                this.clearInfo() 
            },
            transferData(a,b,c,i) { // transfer data from table row into edit form
                this.editData.equipment = a
                this.editData.serial_number = b
                this.editData.comment = c
                this.editData.id = i
            },
            submitEdit(){
                axios.put('/public/api/equipment/'+this.editData.id,this.editData)
                    .then(response=>{
                    })
                    .catch(err => console.log(err.response.data))
            },
            getTypeEquipment() {
                this.isCreated = false // remove info "Equipment was created"
                this.isFailed = false // remove info "Failed message"
                this.errorCreateResult = ""
                axios.get('/public/api/type')
                    .then(response=>{
                        let type = JSON.parse(JSON.stringify(response.data))
                        for (let i = 0; i < type.length; i++) {
                            this.types.push(type[i])
                        }
                    })
                    .catch(err => console.log(err.response.data))
            },
            createEquipment() {
                this.isDeleted = false // remove delete info (if exist)
                // check empty fields in creating form
                if ( !this.createData.equipment  ) {
                    this.isCreated = false // remove info "Creting success"
                    this.isFailed = true
                    this.errorCreateResult = "Empty equipment field"
                } else if (!this.createData.serial_number) {
                    this.isCreated = false // remove info "Creting success"
                    this.isFailed = true
                    this.errorCreateResult = "Empty serial number field"
                } else if (this.createData.equipment && this.createData.serial_number) {
                    axios.post('/public/api/equipment', this.createData)
                        .then(response=>{
                            if (response.data.status == "success") {
                                this.isFailed = false // remove info "Failed creating"
                                this.isCreated = true
                                // reset form
                                this.createData.equipment = ''
                                this.createData.serial_number = ''
                                this.createData.comment = ''
                                this.showData() // re-rendering table with new adds
                            } else {
                                this.isCreated = false // remove info "Creting success"
                                this.isFailed = true
                                this.errorCreateResult = "Check serial number mask or it already exist"
                                console.log('status::: ' + response.data.status);
                            }
                            console.log("response after create: " + response.data.message);
                        })
                        .catch(err => {
                            if (err.response.data.message == "Unauthenticated.") {
                                this.isFailed = true 
                                this.isCreated = false // remove info "Creting success"
                                this.errorCreateResult = "You are not authorized"
                            }
                            console.log(err.response.data)
                        })
                }
            },
            paginateClick(url) {
                this.clearInfo()
                if (url) {
                    axios.get(url)
                        .then(response=>{
                            // clear [] from data
                            this.types.length = 0
                            // fill [] with just recieved data
                            this.types = response.data
                            this.setPagination() 
                        })
                        .catch(err => console.log(err.response.data))
                }
            },
            search() {
                let word = this.searchType.equipment.replace(/(<([^>]+)>)/gi, "");
                axios.get('/public/api/equipment-type/' + word)
                    .then(response=>{
                        if ( response.data.equipment.length == 0 ) {
                            this.searchType.equipment = "Ничего не найдено"
                            return false 
                        }
                        this.types.length = 0
                        this.types = response.data
                        this.setPagination()  
                    })
                    .catch(err => console.log(err.response))
            },
            // clearing info fields after deleting, creating, editing.
            clearInfo() {
                this.isCreated = false
                this.isFailed = false 
                this.isDeleted = false 
                this.errorCreateResult = ''
                this.errorDeleteResult = ''
            }
        },
        mounted() {
            // load boot data
            this.showData()
        }
    }
</script>

<style>
    a {
        text-decoration: none;
    }
    .active {
        background-color: rgb(108, 117, 125);
        padding: 6px 12px;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        color: #dee2e6;
    }
    .pagination-item {
        padding: 6px 12px;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        background-color: transparent;
        transition: 0.3s;
    }
    .pagination-item:hover {
        background-color: #e2e6e9;
    }
    .imgBtn {
        cursor: pointer;
    }
    #searchRow {
        /* width: 620px; */
        position: relative;
        background-color: #dee2e6;
    }
    #searchRow form {
        height:38px;
    }
    table th {
        text-align: center;
    }
    table tr .alignLeft {
        text-align: left;
    }

</style>

