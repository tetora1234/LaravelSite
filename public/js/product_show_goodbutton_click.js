$(function () {
  $('#good-button').click(function () {

    id = $('#send-product-id').val();

    if ($('#first-click').val() === '1') {
      //自己いいね削除
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/product/${id}/deletegoods`,
        type: 'DELETE',
        dataType: "json",
        data: {
          'id': id
        }
      }).done(function (data) {
        alert('いいね削除 成功');
      }).fail(function (data) {
        alert('いいね削除 失敗');
      });
    } else {
      //自己いいね実行
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/product/${id}/good`,
        type: 'POST',
        dataType: "json",
        data: { 'id': id }
      }).done(function (data) {
        alert('いいね初回 成功');
      }).fail(function (data) {

      });
    }
  });
});
