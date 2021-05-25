@extends('layout.admin')
@section('title', 'Add Category')
@section('main')


<form action="{{route('category.store')}}" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name= "name" placeholder="Nhap Ten">
        @error('name')
        <small class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div class="radio">
            <label>
                <imput type="radio" name = "status" value="1" checked>
                    Public
            </label>
            <label>
                <imput type="radio" name = "status" value="0">
                    Private
            </label>
        </div>
        <div class="form-group">
            <label for="">Prioty</label>
            <imput type ="number" class="form-control" name="prioty" placeholder="">
            @error('prioty')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
</form>

    

    
