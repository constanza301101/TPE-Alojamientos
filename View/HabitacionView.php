<?php

class HabitacionView{


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

   
}
?>