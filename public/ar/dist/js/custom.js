// $(document).ready(function() {
$("#description").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, ' ');
    $("#meta_description").val(Text);
});
$("#title").keyup(function() {
    var Text = $(this).val();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, ' ');
    $("#meta_title").val(Text + " || Aashish Jha");
});
$("#title").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
    $("#slug").val(Text);
});
$("#description").keyup(function() {
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, ',');
    $("#keywords").val(Text);
});
// });