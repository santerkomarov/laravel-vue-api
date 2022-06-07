<template>
    <div class=" my-3">
        <h1 class="text-center mb-3">Demo</h1>
        <h4 class="text-center">Админпанель</h4>
        <div class="mb-2 d-flex justify-content-around align-items-center my-2 p-3 rounded" id="searchRow">
            <button class="btn btn-info border-info shadow" type="button" data-toggle="modal" data-target="#create">
                Добавить оборудование
            </button>
                
            <button @click="showData()" class="btn btn-secondary ms-5" type="button" >
                Показать всё
            </button>

            <div class="d-flex justify-content-center">
                <form action="#" class="d-flex justify-content-between ">
                    <input name="equipment" v-model="searchEquipment.equipment" class="form-control me-2" type="search" placeholder="Поиск..." aria-label="Search">
                    <button @click.prevent="search()" class="btn btn-outline-secondary my-2 my-sm-0 me-3" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div> 

        <div class="my-4">
            <div class="my-3 d-flex justify-content-center mx-auto" >

                <!-- Modal create new Equipment-->
                <div class="modal fade" id="create" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Добавление</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border:0;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="bg-warning rounded p-2 mb-2">
                                    Внимание! Заполнение серийного номера осуществляется согласно маске типа оборудования, где <br>
                                    N - числа в диапазоне 0-9<br>
                                    A - заглавные латинские буквы<br>
                                    a - строчные латинские буквы<br>
                                    X - строчные латинские буквы или числа 0-9<br>
                                    Z - символы  "-" или "_" или "@"
                                </div>
                                <form  @submit.prevent="createEquipment()">
                                    <div class="form-group mb-2">
                                        <label for="" class="mb-2">Тип оборудования</label>
                                        <div class="d-flex justify-content-center mb-2">
                                            <div v-for="( pag, index ) in selectPaginations " :key="index" class="mx-1"> 
                                                <button @click="selectPaginateClick(pag.url)" type="button"  :class="[pag.active ? 'active' : 'pagination-item']" v-html="pag.label" :value="pag.active" ></button>
                                            </div>
                                        </div>
                                        <select  class="form-control form-select" v-model="createData.type_equipment" @focus="clearInfo()">
                                            <option  v-for="(type, index) in subStore.equipment " :key="index" :value="type.equipment" placeholder="Выберите тип оборудования">{{type.equipment }} &nbsp;&nbsp;&nbsp; &#10074; маска: {{ type.mask }} &#10074;</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="mb-2">Серийный номер</label>
                                        <input type="text" class="form-control" v-model="createData.serial_number"  placeholder="Серийный номер" @focus="clearInfo()">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="" class="mb-2">Комментарий:</label>
                                        <textarea class="form-control" v-model="createData.comment"  rows="2" @focus="clearInfo()"></textarea>
                                    </div>
                                    <button  type="submit" class="btn btn-primary my-3 me-3">Создать</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <div v-if="isCreated" class="bg-success text-white p-3 rounded">Новое оборудование добавлено</div>
                                    <div v-if="isFailed" class="bg-danger text-white p-3 rounded">{{ errorCreateResult }}</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 mb-1 d-flex justify-content-center ">
                
                <table class="border rounded border-shadow mb-1" style="min-width:500px;">
                    <tr>
                        <th class="bg-secondary text-white border p-2" style="min-width:40px;">id</th>
                        <th class="bg-secondary text-white border p-2" style="min-width:100px;">оборудование</th>
                        <th class="bg-secondary text-white border p-2" style="min-width:100px;">серийный номер</th>
                        <th class="bg-secondary text-white border p-2" style="min-width:100px;">комментарий</th>
                        <th class="bg-secondary text-white border p-2" style="min-width:100px;">управление</th>
                    </tr>
                    <tr v-for="(value, index) in mainStore.equipment" :key="index" class="p-2 border">
                        <td class="text-secondary border p-2" style="max-width:40px;">{{ value.id }}</td>
                        <td class="text-secondary border p-2" style="max-width:300px;word-wrap: break-word;">{{ value.type_equipment }}</td>
                        <td class="text-secondary border p-2" style="max-width:300px;word-wrap: break-word;">{{ value.serial_number }}</td>
                        <td class="text-secondary border p-2" style="max-width:300px;word-wrap: break-word;">{{ value.comment }}</td>
                        <td class="text-secondary  p-2 d-flex justify-content-around" style="border:0;">
                            <img @click="transferData( value.type_equipment, value.serial_number, value.comment, value.id )"
                                :src="imgPath + 'edit.png'"
                                width="30"
                                height="30"
                                data-toggle="modal"
                                data-target="#editModal"
                                class="imgBtn"
                                alt="edit_icon">

                            <!-- Modal Update -->
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border:0;">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  @submit.prevent="editEquipment()">
                                                <div class="bg-warning p-3 mb-2 rounded">Внимание! Это демонстрационный вариант. Серийный номер имеет уникальный ключ для каждого типа оборудования. Редактировать можно только поле комментариев.</div>
                                                <div class="form-group mb-2">
                                                    <label for="">Оборудование</label>
                                                    <input type="text" class="form-control" v-model="editData.type_equipment"   placeholder="Equipment" disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="">Серийный номер</label>
                                                    <input type="text" class="form-control" v-model="editData.serial_number"  placeholder="Serial number" disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="">Комментарий:</label>
                                                    <textarea class="form-control" v-model="editData.comment"  rows="2"></textarea>
                                                </div>
                                                <button @click="submitEdit" type="submit" class="btn btn-primary my-3 me-3">Редактировать</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                <div v-if="isCreated" class="bg-success text-white p-3 rounded">Оборудование обновлено</div>
                                                <div v-if="isFailed" class="bg-danger text-white p-3 rounded">{{ errorCreateResult }}</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <img @click="deleting(value.id)"
                                :src="imgPath + 'delete.png'"
                                width="30"
                                height="30"
                                class="imgBtn"
                                alt="delete_icon">
                        </td>
                    </tr>
                </table>
            </div>
            <div v-if="isDeleted" class="mb-3 mx-auto d-flex justify-content-center bg-danger text-white rounded p-3" style="max-width:620px;">
                {{ errorDeleteResult }} 
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
                mainStore: [],// data for table
                subStore: [],// for select pagination
                links: [],
                labels: [],
                paginations: [],
                selectPaginations: [],
                isActive: false,
                isCreated: false,// display success result of creating 
                isFailed: false, // display failed result of creating
                isDeleted: false, // display success deleting equipment 
                errorCreateResult: '',// info content
                errorDeleteResult: '',
                searchEquipment: {
                    equipment: ''
                },
                editData: {
                    id:'',
                    type_equipment: '',
                    serial_number:'',
                    comment:''
                },
                createData: {
                    type_equipment: '',
                    serial_number:'',
                    comment:''
                }
            }
        },
        methods: {
            showData(){ 
                axios.get('/public/api/equipment')
                    .then(response=>{
                        this.mainStore = response.data
                        this.setPagination()
                    })
                    .catch(err => console.log(err.response.data))
            },
            // set pagination links from respons array
            setPagination() {
                this.paginations.length = 0;// set 0 (clear array) befor add new array
                for (let i = 0; i < this.mainStore.meta.links.length; i++) {
                    let p = this.mainStore.meta.links[i]
                    this.paginations.push(p)
                }
            },
            setPaginationForSelect() {
                this.selectPaginations.length = 0;// set 0 (clear array) befor add new array
                for (let i = 0; i < this.subStore.meta.links.length; i++) {
                    let p = this.subStore.meta.links[i]
                    this.selectPaginations.push(p)
                }
            },
            deleting(id) {
                axios.delete('/public/api/equipment/'+id)
                    .then(response=>{
                        console.log('delete response: ' + response.data.message)
                        // show success
                        this.isDeleted = true // visible div
                        this.errorDeleteResult = "Оборудование было удалено" // set innerHtml
                        this.showData() // after the deleting refresh table with new data
                    })
                    .catch(err => {
                        if (err.response.data.message == "Unauthenticated.") {
                            // show errors 
                            this.isDeleted = true // visible div
                            this.errorDeleteResult = "Вы не авторизованы" // set innerHtml
                        }
                    console.log(err.response.data)
                    })
            },
            editEquipment() {
                // prevent close form after submit, wait response results.
                // clear info (if exist) after click by green image edit inside of table
                this.clearInfo() 
            },

            // transfer data from table rows attributes into edit form
            transferData(a,b,c,i) {
                this.editData.type_equipment = a
                this.editData.serial_number = b
                this.editData.comment = c
                this.editData.id = i
                // clearing info fields after deleting, creating, editing.
                this.clearInfo()
            },
            // send request from edit form to server
            submitEdit() {
                axios.put('/public/api/equipment/'+this.editData.id,this.editData)
                    .then(response=>{
                        this.isCreated = true // set div visible 
                        this.isFailed = false  // remove (if was) error message
                        this.showData() // re-rendering table with new adds
                    })
                    .catch(err => console.log(err.response.data))
            },
            // get data for "create" form in select-options equipment-type list
            getTypeEquipment() {
                this.clearInfo() // clear fields
                axios.get('/public/api/equipment-type')
                    .then(response=>{
                        this.subStore = response.data
                        this.setPaginationForSelect() 
                    })
                    .catch(err => console.log(err.response.data))
            },
            createEquipment() {
                //this.isDeleted = false // remove delete info (if exist)
                // check empty fields in creating form
                if ( !this.createData.type_equipment  ) {
                    this.isCreated = false // remove info "Creting success"
                    this.isFailed = true // show error
                    this.errorCreateResult = "Empty equipment field"
                } else if (!this.createData.serial_number) {
                    this.isCreated = false // remove info "Creting success"
                    this.isFailed = true // show error of empty field "serial_number"
                    this.errorCreateResult = "Empty serial number field"
                } else if (this.createData.type_equipment && this.createData.serial_number) { // both fields are't empty
                    axios.post('/public/api/equipment', this.createData)
                        .then(response=> {
                            if (response.data.status == "success") {
                                this.isFailed = false // remove info "Failed creating"
                                this.isCreated = true // show success
                                // reset form
                                this.createData.type_equipment = ''
                                this.createData.serial_number = ''
                                this.createData.comment = ''
                                this.showData() // re-rendering table with new adds
                            } else { // bad response
                                this.isCreated = false // remove info "Creting success"
                                this.isFailed = true // show error
                                this.errorCreateResult = "Ошибка. Несоответствие маски или такой номер существует."
                            }
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
                this.clearInfo() // skip info messages from DOM
                // paginate button has own url, so by clicking we send request with that url to  server
                if (url) {
                    axios.get(url)
                        .then(response=> {
                            this.mainStore.length = 0 // clear array from old data
                            this.mainStore = response.data // set new one
                            this.setPagination() // make new array of pagination links
                        })
                        .catch(err => console.log(err.response.data))
                }
            },
            selectPaginateClick(url) {
                this.clearInfo() // skip info messages from DOM
                // paginate button has own url, so by clicking we send request with that url to  server
                if (url) {
                    axios.get(url)
                        .then(response=> {
                            this.subStore.length = 0 // clear array from old data
                            this.subStore = response.data // set new one
                            this.setPaginationForSelect() // make new array of pagination links
                        })
                        .catch(err => console.log(err.response.data))
                }
            },
            search() {
                // clearing info fields after deleting, creating, editing.
                this.clearInfo()
                axios.get('/public/api/search/' + this.searchEquipment.equipment)
                    .then(response=>{
                        if ( response.data.equipment.length == 0 ) {
                            // set search field "Поиск" with the value
                            this.searchEquipment.equipment = "Ничего не найдено"
                            return false 
                        }
                        // got some results
                        this.mainStore.length = 0 // clear array from old data
                        this.mainStore = response.data // fill them with new data
                        this.setPagination() // generate new links
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
            },

        },
        mounted() {
            // load boot data
            this.showData()
            // set initial "Create" form select-option fields with data from equipment_type DB
            this.getTypeEquipment()
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
        background-color: #dee2e6;
    }
    #searchRow form {
        height:38px;
    }

</style>

