<template>
  
  <div>
    <h1 class="mt-5">INICIAR SESION</h1>
    <div class= "containerlog">
      <form method="POST">
        <input name="email" type="text" placeholder="Ingrese su email">
        <input name="password" type="password" placeholder="Ingrese su contraseña">
        <input type="submit" value="Ingresar">
      </form>
    </div>
  </div>
  
</template>

<script>
export default {
  head (){
    return {
      title: "Login"
    }
  }
}
</script>