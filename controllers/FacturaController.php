<?php
namespace App\controllers;

use App\models\Factura;
use App\controllers\DataBaseController;

class FacturaController extends DataBaseController{

    function verificaFactura($valorFactura){
        $dataBase = new DataBaseController();
        $sql = "SELECT * FROM facturas WHERE valorFactura = '$valorFactura'";
        $result = $dataBase->execSql($sql);
        if ($valorFactura>=650000) {
            $porcentaje=5;
            $descuento= $porcentaje/100;
            $disminuye=$valorFactura*$descuento;
            $cantidadTotal=$valorFactura-$disminuye;
        } else if ($valorFactura>=100000 && $valorFactura<200000){
            $porcentaje=2;
            $descuento= $porcentaje/100;
            $disminuye=$valorFactura*$descuento;
            $cantidadTotal=$valorFactura-$disminuye;
        } else if ($valorFactura>=200000 && $valorFactura<650000){
            $porcentaje=4;
            $descuento= $porcentaje/100;
            $disminuye=$valorFactura*$descuento;
            $cantidadTotal=$valorFactura-$disminuye;
        }
        $item = $result->fetch_assoc();
        return $cantidadTotal;
    }

    function read() {
        $dataBase = new DataBaseController();
        $sql = "SELECT * FROM facturas";
        $result = $dataBase->execSql($sql);
        $facturas = [];
        if ($result->num_rows == 0) {
            return $facturas;
        }
        while ($item = $result->fetch_assoc()) {
            $factura = new Factura();
            $factura->set('refencia', $item['refencia']);
            $factura->set('fecha', $item['fecha']);
            $factura->set('idCliente', $item['idCliente']);
            $factura->set('valorFactura', $item['valorFactura']);
            $factura->set('descuento', $item['descuento']);
            array_push($facturas, $factura);
        }
        $dataBase->close();
        return $facturas;
    }

    function create($factura) {
        $sql = "INSERT INTO facturas (fecha,idCliente,estado,descuento)values";
        $sql .= "(";
        $sql .= "'".$factura->get('fecha')."',";
        $sql .= "'".$factura->get('idCliente')."',";
        $sql .= "'".$factura->get('valorFactura')."',";
        $sql .= "'".$factura->get('descuento')."'";
        $sql .= ")";
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function update($factura) {
        $sql = "UPDATE facturas SET";
        $sql .= "fecha = '".$factura->get('fecha')."',";
        $sql .= "idCliente = '".$factura->get('idCliente')."',";
        $sql .= "estado = '".$factura->get('valorFactura')."',";
        $sql .= "descuento = '".$factura->get('descuento')."'";
        $sql .= "WHERE refencia = '".$factura->get('refencia')."'";
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function delete($refencia) {
        $sql = "DELETE FROM facturas WHERE refencia = '".$refencia."'";
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }
}
?>