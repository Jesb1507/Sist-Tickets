<template>
<div>
  <div>
    <h1 class="mt-5">Registro</h1>
    <span style="color: white;">o <a style="color: red;" href="/login">Iniciar sesion</a> </span>
  </div>
  <div class = "containerreg">
    <form method="post">
      <input type="text" name="nombre" placeholder="Nombre"> 
      <input type="text" name="nombre" placeholder="Apellido">
      <input type="text" name="email" placeholder="Ingrese su email">
      <input type="password" name="password" placeholder="Ingrese la contraseña">
      <input type="password" name="confirmpassword" placeholder="Confirme la contraseña">
      <input type="submit" value="Registrarse">
    </form>
  </div>
</div>
</template>

<script>
export default {
  head (){
    return {
      title: "Registro"
    }
  }
}
</script>