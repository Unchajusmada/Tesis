// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable({
    lengthMenu: [8],
    pageLength: 8,
  })
})

$(document).ready(function () {
  $("#dataTable2").DataTable({
    lengthMenu: [5],
    pageLength: 5,
  })
})

$(document).ready(function () {
  $("#dataTable3").DataTable({
    lengthMenu: [5],
    pageLength: 5,
  })
})
