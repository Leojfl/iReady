@extends('admin.template.main')
@section('content')
<div class="conteiner">
    <div class="row">
      <div class="col-md-6 mx-auto">
       
        <form method="POST" action="/login">
          
      <div class="row">
        <div class="col-12 col-md-10 col-sm-8">
          <h1 >Datos del restaurante</h1>
          <img src="data:image/jpeg;base64,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"  
          style="width: 200px; height: 200px; border: 2px solid rgb(255, 255, 255)" style="text-align: end">
        </div>
        <div class="col-12 col-md-10 col-sm-8">
          <label for="exampleInputEmail1" class="form-label">Nombre del establecimiento</label>
                <input type="name" class="form-control" id="exampleInputname1" aria-describedby="emailHelp" placeholder="" value="">
        </div>
        <div class="col-12 col-md-10 col-sm-8">
          <label for="exampleInputPassword1" class="form-label">Direccion</label>
                <input type="address" class="form-control" id="exampleInputaddress1" value="">
        </div>
        <div class="col-12 col-md-10 col-sm-8">
          <label for="exampleInputPassword1" class="form-label">Numero de telefono</label>
                <input type="phonenumber" class="form-control" id="exampleInputphonenumber1" value="">
        </div>
        <div class="col-12 col-md-10 col-sm-8">
          <label for="exampleInputPassword1" class="form-label">Fecha de creacion</label>
                <input type="date" class="form-control" id="exampleInputSchedule1" value="">
        </div>
        <div class="col-12 col-md-10 col-sm-8">
          <label for="exampleInputPassword1" class="form-label">Dueño</label>
                <input type="name" class="form-control" id="exampleInputSchedule1" value="">
        </div>
        <div class="col-12 col-md-10 col-sm-8">
          <label for="exampleInputPassword1" class="form-label">Horario</label>
                <input type="name" class="form-control" id="exampleInputSchedule1" value="">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div>
          <label for="formFileLg" class="form-label">Imagen del restaurante</label>
                <input class="form-control form-control-lg" id="formFileLg" type="file">
        </div>
        
        <div class="col-12 col-md-10 col-sm-8">
          <button type="submit" class="btn btn-primary mb-3">Guardar datos</button>
          <ul class="error">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> 
      </div>
          @csrf