@extends('layouts.app')

@section('content')
<div class="row justify-content-center px-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Customer</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="search" placeholder="Search.....">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="button-search"
                                            type="button">Go</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="result"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Form Customer</div>
            <div class="card-body" id="form-store">
                <form id="formCustomer" action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <button onclick="submitForm('#formCustomer')" type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="card-body" id="form-update">
                <form id="formUpdateCustomer" action="#" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <button onclick="updateForm('#formUpdateCustomer')" type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#form-update").hide()
    loadTable()

    $("#button-search").click(function() {
        if($("#search").val() != '') {
            loadTable($("#search").val())
            return
        }
        loadTable()
    })
    
    function loadTable(search = false, link = false) {
        let url = (!search) ? "/customer-table" : "/customer-table?search="+search
        if(link) {
            url = link
        }

        $.ajax({
            url: url,
            success: function(data) {
                $("#result").html(data)

                $(".page-link").click(function(e) {
                    e.preventDefault()
                    loadTable(false, $(this).attr('href'))
                })

                $(".edit-form").click(function(e) {
                    e.preventDefault()
                    let dataForm = $(this).attr('data-ref').split("|")
                    $("#formUpdateCustomer input[name='first_name']").val(dataForm[0])
                    $("#formUpdateCustomer input[name='address']").val(dataForm[1])
                    $("#formUpdateCustomer input[name='phone']").val(dataForm[2])
                    $("#formUpdateCustomer").attr('action', $(this).attr('href'))

                    $("#form-store").slideUp("slow", function() {
                        $("#form-update").slideDown()
                    });
                })


            }
        })
    }

    function submitForm(id) {
        let actionUrl = $(id).attr('action')
        let dataForm = $(id).serialize()

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: dataForm,
            success: function(data) {
                loadTable()
                $(id +" input[name='first_name']").val("")
                $(id +" input[name='address']").val("")
                $(id +" input[name='phone']").val("")
            },
            error: function(error) {
                window.location.replace('{{ route("login") }}')
                return false
            }
        });
    }

    function updateForm(id) {
        let actionUrl = $(id).attr('action')
        let dataForm = $(id).serialize()

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: dataForm,
            success: function(data) {
                loadTable()
                $("#form-update").slideUp("slow", function() {
                    $("#form-store").slideDown()
                });
            },
            error: function(error) {
                window.location.replace('{{ route("login") }}')
                return false
            }
        });
    }
</script>
@endsection