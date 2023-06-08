function excluir(id){
  if (confirm("Deseja mesmo excluir o comentário?")==true) {
   window.location.href = `../server/excluiComentario.php?id=${id}`;
  }
}

function excluirPost(id){
  if (confirm("Deseja mesmo excluir a publicação?")==true) {
   window.location.href = `../server/excluiPost.php?id=${id}`;
  }
}