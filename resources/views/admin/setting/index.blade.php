@extends('layout.dashboard.app')

@section('title', 'Posts List')

@section('body')
 
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Setting</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered ">
            <tr>
                <th class="text-primary text-center" >Stie Name</th>
                <td class="text-dark text-center" > {{$getSetting->stie_name}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Email</th>
                <td class="text-dark text-center" > {{$getSetting->email}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Favicon</th>
                <td class="text-dark text-center" ><img src="{{asset($getSetting->favicon)}}" style="width: 50px; height: 50px;"></td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Logo</th>
                <td class="text-dark text-center" ><img src="{{asset($getSetting->logo)}}" style="width: 50px; height: 50px;"></td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Phone</th>
                <td class="text-dark text-center" > {{$getSetting->phone}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Facebook</th>
                <td class="text-dark text-center" > {{$getSetting->facebook}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Linkendin</th>
                <td class="text-dark text-center" > {{$getSetting->linkendin}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Twitter</th>
                <td class="text-dark text-center" > {{$getSetting->twitter}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Youtube</th>
                <td class="text-dark text-center" > {{$getSetting->youtube}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Instagram</th>
                <td class="text-dark text-center" > {{$getSetting->instagram}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Country</th>
                <td class="text-dark text-center" > {{$getSetting->country}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >City</th>
                <td class="text-dark text-center" > {{$getSetting->city}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Street</th>
                <td class="text-dark text-center" > {{$getSetting->street}} </td>
            </tr>
            <tr>
                <th class="text-primary text-center" >Smail Desc</th>
                <td class="text-dark text-center" > {{$getSetting->smail_desc}} </td>
            </tr>
        </table>
    </div>


    
@endsection