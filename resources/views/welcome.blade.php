@extends('layout.index')
@section('header')
    Vue js CURD
@endsection

@section('content')
<style>
    .form-control{
        width:300px;
        margin-bottom:10px;
    }
    h3{
        margin-top:0px;
        margin-bottom:15px;
    }
</style>
    <div id="app" class="box box-info">
        <div class="box-body">
            {{--<pre>{{ print_r($data) }}</pre>--}}
            <router-view></router-view>
        </div>

    </div>

    <template id="table-data">
        <a v-link="{path: '/create'}" class="label label-info">Add New</a>
        <input style="float:right; width:200px" type="text" v-model="search" class="form-control" placeholder="Search..">
        <table  class="table table-bordered">
            <tr><th>Name</th><th>Email</th><th>Address</th><th>phone</th><th>Occupation</th><th>Action</th></tr>
            <tr v-for="member in members | filterBy search">
                <td>@{{ member.name }}</td>
                <td>@{{ member.email }}</td>
                <td>@{{ member.address }}</td>
                <td>@{{ member.phone }}</td>
                <td>@{{ member.occupation }}</td>
                <td>
                    <a v-link="{name: 'view', params: {member_id: member.id}}" class="label label-info">View</a>
                    <a v-link="{name: 'edit', params: {member_id: member.id}}" class="label label-primary">Edit</a>
                    <a v-link="{name: 'delete', params: {member_id: member.id}}" class="label label-danger">Delete</a>
                </td>
            </tr>
        </table>
    </template>

    <template id="member_view">
        <h3>Member Full Information</h3>
	<span v-for="member in view_member">
		<h3>Name: @{{ member.name }}</h3>
		<p>Email: @{{ member.email }}</p>
		<p>Mobile: @{{ member.phone }}</p>
		<p>Address: @{{ member.address }}</p>
		<p>Created at: @{{ member.created_at }}</p>
	</span>
    </template>

    <template id="member_edit">
        <h3>Member Edit</h3>
    </template>

    <template id="member_create">
        <h3>Member Create</h3>
        <div v-if="success == true" class="alert alert-danger">Successfully Stored</div>
        <validator name="validation1">
            <form novalidate>
                <input type="text" class="form-control" v-model="data.name" placeholder="Enter the Name" v-validate:name="{required: true}">

                <span style="color:red" v-if="$validation1.name.touched && $validation1.name.invalid">
                        <span ng-show="$validation1.name.required">First name is required.</span>
                </span>

                <input type="email"  class="form-control" v-model="data.email" placeholder="Enter the Email" v-validate:email="{required: true, email: true}">

                <span style="color:red" v-if="$validation1.email.touched && $validation1.email.invalid">
                        <span v-if="$validation1.email.required">E-mail is required</span>
                        <span v-if="$validation1.email.email && !$validation1.email.required">Invalid Email</span>
                </span>

                <input type="text" id="phone" class="form-control" v-model="data.phone" placeholder="Enter the Phone" v-validate:phone="['required']">

                <span style="color:red" v-if="$validation1.phone.touched && $validation1.phone.invalid">
                        <span v-show="$validation1.phone.required">Phone is required</span>
                </span>

                <textarea id="addres" class="form-control" v-model="data.address" placeholder="Enter the Address" v-validate:address="['required']"></textarea>

                <span style="color:red" v-if="$validation1.address.touched && $validation1.address.invalid">
                        <span v-show="$validation1.email.required">Address is required</span>
                </span>

                <input type="text" id="occupation" v-model="data.occupation" class="form-control" placeholder="Enter the Occupation" v-validate:occupation="['required']">


                <span style="color:red" v-if="$validation1.occupation.touched && $validation1.occupation.invalid">
                        <span v-show="$validation1.occupation.required">Occupation is required</span>
                </span>

                <input type="button" @click="getCreate(data)" class="btn btn-success" :disabled="!$validation1.valid" value="Create">
            </form>
        </validator>
    </template>
@endsection