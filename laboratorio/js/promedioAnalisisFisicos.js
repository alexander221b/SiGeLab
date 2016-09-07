/**
* Función que se ejecuta cada vez que se añade una letra en un cuadro de texto
* Saca el promedio de los valores de los cuadros de texto
*/
function sumar(nombre) {
  // Se verifica que 
  var ph1 = verificar("ph1");
  var ph2 = verificar("ph2");
  var temperatura1 = verificar("temperatura1");
  var temperatura2 = verificar("temperatura2");
  var colorAparente1 = verificar("colorAparente1");
  var colorAparente2 = verificar("colorAparente2");
  var colorVerdadero1 = verificar("colorVerdadero1");
  var colorVerdadero2 = verificar("colorVerdadero2");
  var turbiedad1 = verificar("turbiedad1");
  var turbiedad2 = verificar("turbiedad2");
  var sustanciasFlotantes1 = verificar("sustanciasFlotantes1");
  var sustanciasFlotantes2 = verificar("sustanciasFlotantes2");
  var olor1 = verificar("olor1");
  var olor2 = verificar("olor2");
  var oxigenoDisuelto1 = verificar("oxigenoDisuelto1");
  var oxigenoDisuelto2 = verificar("oxigenoDisuelto2");
  var conductividad1 = verificar("conductividad1");
  var conductividad2 = verificar("conductividad2");
  var temperaturaSegunda1 = verificar("temperaturaSegunda1");
  var temperaturaSegunda2 = verificar("temperaturaSegunda2");
  var fluoruros1 = verificar("fluoruros1");
  var fluoruros2 = verificar("fluoruros2");
  if(nombre == "ph1" || nombre == "ph2") {
    document.getElementById("phPromedio").value= (parseFloat(ph1.replace(",", "."))+parseFloat(ph2.replace(",", ".")))/2;
  }      
  if(nombre == "temperatura1" || nombre == "temperatura2") {
    document.getElementById("temperaturaPromedio").value=(parseFloat(temperatura1.replace(",", "."))+parseFloat(temperatura2.replace(",", ".")))/2;
  }
  if(nombre == "colorAparente1" || nombre == "colorAparente2") {
    document.getElementById("colorAparentePromedio").value=(parseFloat(colorAparente1.replace(",", "."))+parseFloat(colorAparente2.replace(",", ".")))/2;
  }
  if(nombre == "colorVerdadero1" || nombre == "colorVerdadero2") {
    document.getElementById("colorVerdaderoPromedio").value=(parseFloat(colorVerdadero1.replace(",", "."))+parseFloat(colorVerdadero2.replace(",", ".")))/2;
  }
  if(nombre == "turbiedad1" || nombre == "turbiedad2") {
    document.getElementById("turbiedadPromedio").value=(parseFloat(turbiedad1.replace(",", "."))+parseFloat(turbiedad2.replace(",", ".")))/2;
  }
  if(nombre == "sustanciasFlotantes1" || nombre == "sustanciasFlotantes2") {
    document.getElementById("sustanciasFlotantesPromedio").value=(parseFloat(sustanciasFlotantes1.replace(",", "."))+parseFloat(sustanciasFlotantes2.replace(",", ".")))/2;
  }
  if(nombre == "olor1" || nombre == "olor2") {
    document.getElementById("olorPromedio").value=(parseFloat(olor1.replace(",", "."))+parseFloat(olor2.replace(",", ".")))/2;
  }
  if(nombre == "oxigenoDisuelto1" || nombre == "oxigenoDisuelto2") {
    document.getElementById("oxigenoDisueltoPromedio").value=(parseFloat(oxigenoDisuelto1.replace(",", "."))+parseFloat(oxigenoDisuelto2.replace(",", ".")))/2;
  }
  if(nombre == "conductividad1" || nombre == "conductividad2") {
    document.getElementById("conductividadPromedio").value=(parseFloat(conductividad1.replace(",", "."))+parseFloat(conductividad2.replace(",", ".")))/2;
  }
  if(nombre == "temperaturaSegunda1" || nombre == "temperaturaSegunda2") {
    document.getElementById("temperaturaSegundaPromedio").value=(parseFloat(temperaturaSegunda1.replace(",", "."))+parseFloat(temperaturaSegunda2.replace(",", ".")))/2;
  }
  if(nombre == "fluoruros1" || nombre == "fluoruros2") {
    document.getElementById("fluorurosPromedio").value=(parseFloat(fluoruros1.replace(",", "."))+parseFloat(fluoruros2.replace(",", ".")))/2;
  }
}
/**
* Funcion para verificar los valores de los cuadros de texto. Si no es un
* valor numerico, cambia de color el borde del cuadro de texto
*/
function verificar(id) {
  var obj=document.getElementById(id);
  if(obj.value=="") {
    value="0";
  } 
  else {
    value=obj.value;
  }
  if(validate_importe(value,1)) {
    obj.style.borderColor="#C0C0C0";
    return value;
  }
  else {
    // marcamos como erroneo
    obj.style.borderColor="#f00";
    return 0;
  }
}
/**
* Funcion para validar el importe
* Tiene que recibir:
  El valor del importe (Ej. document.formName.operator)
* Determina si permite o no decimales [1-si|0-no]
* Devuelve:
  true-Todo correcto
  false-Incorrecto
*/
function validate_importe(value,decimal) {
  if(decimal==undefined) {
    decimal=0;
  }
  if(decimal==1) {
  // Permite decimales tanto por . como por ,
    var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,50})?$");
  }
  else {
  // Numero entero normal
    var patron=new RegExp("^([0-9])*$")
  }
  if(value && value.search(patron)==0) {
    return true;
  }
  return false;
}