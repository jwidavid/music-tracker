$('#tableAlbums').DataTable({
    'initComplete': function() {
        let column = this.api().column(2);
        $('#bandNames').on('change', function() {
            column.search(this.value ? '\\b' + this.value + '\\b' : "", true, false).draw();
        });
    }
});
