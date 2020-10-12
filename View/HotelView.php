<?php


class HotelView {
    
    /**
     * Muestra la lista de habitaciones por hotel
     */
    function renderHabitacionesByHotel($hotel, $habitaciones) {

        echo "<h1>Lista de habitaciones por hotel:".$hotel."</h1>";
        $this->renderHabitaciones($habitaciones);
    }

    function renderHabitaciones($habitaciones) {

        echo "<a href='index.html'> Volver </a>";

        // imprime la tabla de habitaciones
        echo "<table>
        <thead>
            <tr>
                <th>Habitacion</th>
                <th>Hotel</th>
                <th>capacidadMax</th>
                <th>cantCamas</th>
                <th>cantBaños</th>
                <th>TV</th>
                <th>Wifi</th>
                <th>Descripcion</th>
            </tr>
        <thead>
        <tbody>
        ";
        foreach($habitaciones as $habitacion) {
        echo "
            <tr>
                <td>$habitacion->id_habitacion</td>
                <td>$habitacion->id_hotel</td>
                <td>$habitacion->capacidadMax</td>
                <td>$habitacion->cantCamas</td>
                <td>$habitacion->cantBanios</td>
                <td>$habitacion->tv</td>
                <td>$habitacion->wifi</td>
                <td>$habitacion->descripcion</td>
            </tr>
        ";
        }
        echo " </tbody>    
        </table>";
    }

    function renderHoteles($hoteles) {

        echo "<a href='index.html'> Volver </a>";

        // imprime la tabla de hoteles
        echo "<table>
        <thead>
            <tr>
                <th>Hotel</th>
                <th>Localidad</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Valoracion</th>
                <th>Descripcion</th>
            </tr>
        <thead>
        <tbody>
        ";
        foreach($hoteles as $hotel) {
        echo "
            <tr>
                <td>$hotel->nombre</td>
                <td>$hotel->localidad</td>
                <td>$hotel->direccion</td>
                <td>$hotel->telContacto</td>
                <td>$hotel->valoracion</td>
                <td>$hotel->descripcion</td>
            </tr>
        ";
        }
        echo " </tbody>    
        </table>";
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

}