<?php


class HotelView {
    
    /**
     * Muestra la lista de habitaciones por hotel
     */
    function renderHabitacionesByHotel($hotel, $habitaciones) {

        echo "<h1>Lista de habitaciones por hotel:".$hotel."</h1>";
        $this->renderHabitaciones($habitaciones);
    }

    function renderError() {
        echo "<h2>Error! Hotel no especificado.</h2>";
    }

    function renderInsertHotel(){
        echo " <h1> Ingrese los datos del nuevo hotel</h1>
        <form>
        <div>
          <div>
            <label for='inputHotel'>Nombre:</label>
            <input type='nombre' class='form-control' id='inputHotel' placeholder='Nombre'>
          </div>
          <div class='form-group col-md-6'>
            <label for='inputDireccion'>Direccion</label>
            <input type='direccion' class='form-control' id='inputDireccion' placeholder='Direccion'>
          </div>
        </div>
        <div class='form-group'>
          <label for='inputLocalidad'>Localidad</label>
          <input type='localidad' class='form-control' id='inputLocalidad' placeholder='Localidad'>
        </div>
        <button type='submit' class='btn btn-primary'>Agregar</button>
      </form> ";
    }

    function renderHoteles($hoteles){
        $smarty = neW smarty (); 
        //le asignamos el titulo y el mensaje 
        $smarty->assign('hoteles', $hoteles);
        // muestro el template para el formulario de login
        $smarty->display('templates/hotels.tpl'); 
    }

}
?>