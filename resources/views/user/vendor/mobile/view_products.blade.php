@extends('layouts.app')
@section('content')
<style>
    input[type=email],
    input[type=number],
    input[type=password],
    input[type=search],
    input[type=tel],
    input[type=text],
    input[type=url],
    textarea {
        background-color: #fff;
        /* border: 1px solid #e0e2e3; */
        color: var(--tp-common-black);
        height: 41px;
        width: 65%;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<x-vendor.header />
<div class="col-xxl-8 col-lg-9">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="profile__tab-content">
        <div class="row">
            <h5 class="mb-0 me-3">View Products</h5>
        </div>
        <hr>
        <div class="tab-content">
            <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Phone</th>
                        <th>Views</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mobiles as $mobile)
                    <tr>
                        <td>{{$mobile->mobile->brand}}</td>
                        <td>{{$mobile->mobile->phone}}</td>
                        <td>0</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<x-vendor.footer />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#myTable').DataTable({
            "pageLength": 50,
        });
    });
</script>
@endsection