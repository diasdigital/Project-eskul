@extends('frontend.layouts.main')
@section('frontend')

  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'id',
        businessHours: true,
        dayMaxEvents: false, // allow "more" link when too many events
        events: [
          <?php foreach ($tb_kegiatan as $kegiatan) {
              echo "{
                title: '$kegiatan->nama_kegiatan',
                url: '/ekstrakulikuler/$kegiatan->slug/',
                start: '$kegiatan->tanggal_pelaksanaan'
              },";
              } ?>
        ]
      });
  
      calendar.render();
    });
  
  </script>
  <style>
  
    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }
  
    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }
  
  </style>

  <main id="main">

    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Kegiatan</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
      </div>
    </section>

    <div id='calendar' class="mb-5"></div>

  </main>
  
    
@endsection