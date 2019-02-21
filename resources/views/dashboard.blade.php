@extends('app')

@section('content')
    <div class="row" id="crud">
        <div class="col-xs-12 mt-4">
            <h1 class="page-header">Crud Laravel Vue JS</h1>
        </div>
        <div class="col-sm-7 mt-5">
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">New Task</a>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th colspan="2">
                                &nbsp 
                        </th>
                    </tr>
                </thead>
                <tbody v-for="keep in keeps" >
                    <tr>
                        <td width="10px" > @{{ keep.id }}</td>
                        <td>@{{ keep.keep }}</td>
                        <td width="10px" >
                            <a href="#" class="btn btn-warning btn-sm"  v-on:click.prevent="editKeep(keep)" >Editar</a>
                        </td>
                        <td width="10px" >
                            <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)" >Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" @click.prevent="changePage(pagination.current_page - 1)" >
                            <span>Atras</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active' : '']" >
                        <a href="#" @click.prevent="changePage(page)">
                            @{{ page }}
                        </a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page" >
                        <a href="#" @click.prevent="changePage(pagination.current_page + 1)" >
                            <span>Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>
            @include('edit')
            @include('create')
        </div>
        <div class="col-sm-5">
            <pre>
                @{{ $data }}
            </pre>
        </div>
    </div>
@endsection