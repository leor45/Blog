$(document).ready(function () {
    $("#inicio").click(function () {
        $("#principal").hide();
        $("#mensajes").hide();
        $("#iniciar").fadeIn();
        $("#reg").hide();
        $("#Alerta").hide();

    });

    $("#Principal").click(function () {
        $("#principal").fadeIn();
        $("#mensajes").fadeIn();
        $("#iniciar").hide();
        $("#reg").hide();
        $("#Alerta").hide();

    });

    $("#registro").click(function () {
        $("#principal").hide();
        $("#reg").fadeIn();
        $("#mensajes").hide();
        $("#iniciar").hide();
        $("#Alerta").hide();

    });

    $("#busqueda").click(function () {
        $("#principal").hide();
        $("#reg").hide();
        $("#Alerta").fadeIn();
        $("#mensajes").hide();
        $("#iniciar").hide();

    });

    $("#login").click(function () {
        $("#mensajes").hide();
        $("#principal").hide();
        $("#ModMsj").hide();
        $("#Perfil").fadeIn();
        $("#enviar").hide();
        $("#modificarM").hide();
        $("#contraseña").hide();
    });

    $("#pass").click(function () {
        $("#mensajes").hide();
        $("#principal").hide();
        $("#ModMsj").hide();
        $("#Perfil").hide();
        $("#enviar").hide();
        $("#modificarM").hide();
        $("#contraseña").fadeIn();
    });

    $("#modificar").click(function () {
        $("#mensajes").hide();
        $("#principal").hide();
        $("#ModMsj").hide();
        $("#Perfil").hide();
        $("#enviar").hide();
        $("#contraseña").hide();
        $("#modificarM").fadeIn();
    });
});