$('#miTabla').DataTable({
    "pageLength": 50, // Configurar cuántos registros mostrar por página
    "language": {
        "search": "Buscar:", // Personalizar el texto de búsqueda
        "lengthMenu": "Mostrar _MENU_ registros por página"
    }
});

const editar = (i) => {
    window.open(`./editarView.php?id=${i}`, "editar", "width=600, height=800, top=100, left=100");
}

const atrasEditar = () => {
    window.opener.location.reload();
    window.close();
}