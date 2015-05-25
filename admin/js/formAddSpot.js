
      $('#nom_spot').blur(function() {
        var tmp = $('#nom_spot').val();
        if(tmp.length > 0) {
          $('#nom_spot_group').removeClass('has-error').addClass('has-success');
          $('#nom_spot_group .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        } else {
          $('#nom_spot_group').removeClass('has-success').addClass('has-error');
          $('#nom_spot_group .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        }
      });

      $('#adresse_spot').blur(function() {
        var tmp = $('#adresse_spot').val();
        if(tmp.length > 0) {
          $('#adresse_spot_group').removeClass('has-error').addClass('has-success');
          $('#adresse_spot_group .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        } else {
          $('#adresse_spot_group').removeClass('has-success').addClass('has-error');
          $('#adresse_spot_group .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        }
      });

      $('#lat_spot').blur(function() {
        var tmp = $('#lat_spot').val();
        if($.isNumeric(tmp)) {
          $('#lat_spot_group').removeClass('has-error').addClass('has-success');
          $('#lat_spot_group .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        } else {
          $('#lat_spot_group').removeClass('has-success').addClass('has-error');
          $('#lat_spot_group .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        }
      });

      $('#lng_spot').blur(function() {
        var tmp = $('#lng_spot').val();
        if($.isNumeric(tmp)) {
          $('#lng_spot_group').removeClass('has-error').addClass('has-success');
          $('#lng_spot_group .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        } else {
          $('#lng_spot_group').removeClass('has-success').addClass('has-error');
          $('#lng_spot_group .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        }
      });

      $('#desc_spot').blur(function() {
        var tmp = $('#desc_spot').val();
        if(tmp.length > 0) {
          $('#desc_spot_group').removeClass('has-error').addClass('has-success');
          $('#desc_spot_group .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        } else {
          $('#desc_spot_group').removeClass('has-success').addClass('has-error');
          $('#desc_spot_group .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        }
      });

      $('#key_spot').blur(function() {
        var tmp = $('#key_spot').val();
        if(tmp.length <= 7 && tmp.length != 0) {
          $('#key_spot_group').removeClass('has-error').addClass('has-success');
          $('#key_spot_group .glyphicon').removeClass('glyphicon-remove').addClass('glyphicon-ok');
        } else {
          $('#key_spot_group').removeClass('has-success').addClass('has-error');
          $('#key_spot_group .glyphicon').removeClass('glyphicon-ok').addClass('glyphicon-remove');
        }
      });