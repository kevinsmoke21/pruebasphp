<?php


namespace UBB\Intranet\Testing;

use UBB\Intranet\Proyecto\ArriendoEquipos;
use PHPUnit\Framework\TestCase;


class ArriendoEquiposTest extends TestCase {
    public function testAgregarContratoDiceStringMuyLargo()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 41), // Código de 41 caracteres (máximo permitido es 40)
            123, // Correlativo válido
            456, // RUT/Razón Social válido
            1,   // Código de moneda válido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Código debe ser un string de maximo 40 caracteres.'],
            $result
        );
    }

    public function testAgregarContratoDiceCorrelativoDebeSerNumero()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            'A', // Correlativo Invalido
            456, // RUT/Razón Social válido
            1,   // Código de moneda válido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Correlativo debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoDiceCorrelativoDebeSerNumeroAhoraEsEspacio()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            '123', // Correlativo Invalido
            456, // RUT/Razón Social válido
            1,   // Código de moneda válido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Correlativo debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoDiceRutDebeSerNumeroEsSTRING()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo valido
            'ALOJA', // RUT/Razón Social Invalido
            1,   // Código de moneda válido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'RUT/Razón Social debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoDiceRutDebeSerNumeroEsVacio()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Valido
            '', // RUT/Razón Social invalido
            1,   // Código de moneda válido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'RUT/Razón Social debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoDiceRutDebeSerNumeroEsStringSimbolos()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            '$#', // RUT/Razón Social válido
            1,   // Código de moneda válido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'RUT/Razón Social debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoCodigoMonedaDebeSerNumeroEsVacio()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo valido
            123, // RUT/Razón Social válido
            '',   // Código de moneda Invalido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Código de moneda debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoCodigoMonedaDebeSerNumeroEsString()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo valido
            123, // RUT/Razón Social válido
            'pepe',   // Código de moneda Invalido
            'Descripción válida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Código de moneda debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoCodigoDescripcionEsMuyLargo()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            str_repeat('A', 256), // Descripción inválida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Descripción debe ser un string de hasta 255 caracteres.'],
            $result
        );
    }

    public function testAgregarContratoCodigoDescripcionEsNumero()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            1, // Descripción inválida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Descripción debe ser un string de hasta 255 caracteres.'],
            $result
        );
    }

    public function testAgregarContratoFechaDeInicioinvalidaEsString()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion Valida', // Descripción válida
            '51', // Fecha inicio invalida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Fecha de inicio no es válida.'],
            $result
        );
    }

    public function testAgregarContratoFechaDeInicioinvalidaEsformatoaletorio()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda Invalido
            'Descripcion Valida', // Descripción válida
            '12-2024-31', // Fecha inicio invalida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Fecha de inicio no es válida.'],
            $result
        );
    }

    public function testAgregarContratoFechaDeInicioinvalidaEsNumero()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda Invalido
            'Descripcion Valida', // Descripción válida
            1, // Fecha inicio invalida
            '2024-12-31 12:00:00', // Fecha término válida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );
        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Fecha de inicio no es válida.'],
            $result
        );
    }

    public function testAgregarContratoFechaDeTerminoEsStringRandom()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Valido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion valida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            'ola', // Fecha término inválida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );
        $this->assertEquals(
            ['error' => 'Fecha de término no es válida.'],
            $result
        );
    }

    public function testAgregarContratoFechaDeTerminoEsNumero()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Valido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion valida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            1, // Fecha término inválida
            1000, // Total inversión válido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );
        $this->assertEquals(
            ['error' => 'Fecha de término no es válida.'],
            $result
        );
    }

    public function testAgregarContratoInversionTotalEsString()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion Valida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            'alo', // Total inversión inválido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Total inversión debe ser un número.'],
            $result
        );
    }

    public function testAgregarContratoInversionTotalEsVacio()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion Valida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            '', // Total inversión inválido
            '2024-12-15 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Total inversión debe ser un número.'],
            $result
        );
    }
    public function testAgregarContratoFechaFacturacionVacia()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion Valida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            300, // Total inversión inválido
            ''  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Fecha de facturación no es válida.'],
            $result
        );
    }

    public function testAgregarContratoFechaFacturacionSinFormato()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion Valida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            300, // Total inversión inválido
            '12-2024-31 12:00:00'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Fecha de facturación no es válida.'],
            $result
        );
    }

    public function testAgregarContratoFechaFacturacionEsString()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();

        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregar_contrato(
            str_repeat('A', 40), // Código VALIDO
            123, // Correlativo Invalido
            123, // RUT/Razón Social válido
            1,   // Código de moneda valido
            'Descripcion Valida', // Descripción válida
            '2024-12-01 12:00:00', // Fecha inicio válida
            '2024-12-31 12:00:00', // Fecha término válida
            300, // Total inversión inválido
            'alo'  // Fecha facturación válida
        );

        // Comprobar el resultado
        $this->assertEquals(
            ['error' => 'Fecha de facturación no es válida.'],
            $result
        );
    }

    public function testAgregarEquipoCorrelativoEsString()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregarNuevoEquipo(
            'A', // Correlativo Invalido
            'ABC123', // Serial de equipo válido
            1, // perfil válida
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Correlativo del equipo debe ser un entero.'],
            $result
        );
    }

    public function testAgregarEquipoCorrelativoEsVacio()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregarNuevoEquipo(
            '', // Correlativo Invalido
            'ABC123', // Serial de equipo válido
            1, // perfil válida
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Correlativo del equipo debe ser un entero.'],
            $result
        );
    }

    public function testAgregarEquipoCorrelativoEsNegativo()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregarNuevoEquipo(
            -12, // Correlativo Invalido
            'ABC123', // Serial de equipo válido
            1, // perfil válida
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Correlativo del equipo debe ser mayor a 0.'],
            $result
        );
    }

    public function testAgregarEquipoSerialEsNumero()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            5, // Serial de equipo invalida
            1, // perfil válida
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Serial del equipo debe ser una cadena de caracteres.'],
            $result
        );
    }

    public function testAgregarEquipoSerialEsVacio()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            '', // Serial de equipo invalida
            1, // perfil válida
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Serial del equipo no puede estar vacío.'],
            $result
        );
    }

    public function testAgregarEquipoSerialTieneEspacios()
    {
        // Crear instancia de la clase que contiene la función
        $arriendo_equipos = new ArriendoEquipos();
        // Llamar a la función con un código demasiado largo
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ASHDKAJD112 ', // Serial de equipo invalida
            1, // perfil válida
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Serial del equipo no debe contener espacios.'],
            $result
        );
    }

    public function testAgregarEquipoSerialEsMuyLargo(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            str_repeat('A', 256), // Serial de equipo invalida
            1, // perfil válida
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Serial del equipo no debe exceder los 255 caracteres.'],
            $result
        );
    }

    public function testAgregarEquipoPerfilEsString(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            'aasda12', // perfil invalido
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'El correlativo de Perfil debe ser un entero.'],
            $result
        );
    }

    public function testAgregarEquipoPerfilEsDecimal(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            12.5, // perfil invalido
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'El correlativo de Perfil debe ser un entero.'],
            $result
        );
    }

    public function testAgregarEquipoPerfilEsVacio(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            '', // perfil invalido
            'Desktop', // Tipo válido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Perfil del equipo no puede estar vacío.'],
            $result
        );
    }

    public function testAgregarEquipoTipoEsNumero(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            12, // Tipo invalido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Tipo debe ser una cadena de caracteres.'],
            $result
        );
    }

    public function testAgregarEquipoTipoEsVacio(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            '', // Tipo invalido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Tipo del equipo no puede estar vacío.'],
            $result
        );
    }

    public function testAgregarEquipoTipoTieneEspacios(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desk Top', // Tipo invalido
            '123CBA' , // Modelo válido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Tipo no debe contener espacios.'],
            $result
        );
    }

    public function testAgregarEquipoModeloEsEntero(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            5 , // Modelo invalido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Modelo debe ser una cadena de caracteres.'],
            $result
        );
    }

    public function testAgregarEquipoModeloEsComienzaConEspacio(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            ' Modelo5' , // Modelo invalido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Modelo no debe empezar con espacios.'],
            $result
        );
    }

    public function testAgregarEquipoModeloTiene2EspaciosSeguidos(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5  2ca' , // Modelo invalido
            'ALSKDJLKAS 123123' , // Descripción válida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Modelo no debe contener 2 espacios seguidos.'],
            $result
        );
    }

    public function testAgregarEquipoDescripcionEsNumero(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            5 , // Descripción invalida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Descripción debe ser una cadena de caracteres.'],
            $result
        );
    }

    public function testAgregarEquipoDescripcionEsVacio(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            '' , // Descripción invalida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Descripción no puede estar vacía.'],
            $result
        );
    }

    public function testAgregarEquipoDescripcionEmpiezaConEspacio(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            ' Descripcion1' , // Descripción invalida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Descripción no debe empezar con espacios.'],
            $result
        );
    }

    public function testAgregarEquipoDescripcionTiene2EspaciosSeguidos(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            'Descripcion1  parte2' , // Descripción invalida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Descripción no debe contener 2 espacios seguidos.'],
            $result
        );
    }

    public function testAgregarEquipoFechaRegistroEsNum(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            'Descripcion loca' , // Descripción valida
            3, // Fecha inicio inválida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Fecha de registro no es válida.'],
            $result
        );
    }

    public function testAgregarEquipoFechaRegistroEsString(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            'Descripcion loca' , // Descripción valida
            '122', // Fecha inicio inválida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Fecha de registro no es válida.'],
            $result
        );
    }

    public function testAgregarEquipoFechaRegistroFormatoAleatorio(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            'Descripcion loca' , // Descripción valida
            '12-2024-26', // Fecha inicio inválida
            'DISPONIBLE' // Estado válido
        );
        $this->assertEquals(
            ['error' => 'Fecha de registro no es válida.'],
            $result
        );
    }

    public function testAgregarEquipoEstadoEsNum(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            'Descripcion loca' , // Descripción valida
            '2024-12-13 12:00:00', // Fecha inicio válida
            2 // Estado invalido
        );
        $this->assertEquals(
            ['error' => 'Estado debe ser una cadena de caracteres.'],
            $result
        );
    }

    public function testAgregarEquipoEstadoContieneNumeros(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            'Descripcion loca' , // Descripción valida
            '2024-12-13 12:00:00', // Fecha inicio válida
            'Disponible2' // Estado invalido
        );
        $this->assertEquals(
            ['error' => 'Estado debe contener solo letras.'],
            $result
        );
    }

    public function testAgregarEquipoEstadoEsVacio(){
        $arriendo_equipos = new ArriendoEquipos();
        $result = $arriendo_equipos->agregarNuevoEquipo(
            12, // Correlativo valido
            'ABC123', // Serial de equipo valida
            1, // perfil valido
            'Desktop', // Tipo valido
            'Modelo5' , // Modelo valido
            'Descripcion loca' , // Descripción valida
            '2024-12-13 12:00:00', // Fecha inicio válida
            '' // Estado invalido
        );
        $this->assertEquals(
            ['error' => 'Estado no puede estar vacío.'],
            $result
        );
    }
}
