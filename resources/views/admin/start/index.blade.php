@extends('layouts.admin')

@section('title', 'Start')
@section('content')

  <section class="head-block">
    <div class="title-block">
      <div class="title-box">
        <p class="title">Admin Start</p>
      </div>
    </div>
    <div class="services-block">
      <div class="services-box"></div>
    </div>
  </section>
  <section class="chart-rows-block">
    <div class="chart-mini-row">
      <div class="chart-mini" name="chartCategories">
        <canvas id="testChart1"></canvas>
      </div>
      <div class="chart-mini" name="chartItems">
        <canvas id="testChart2"></canvas>
      </div>
      <div class="chart-mini" name="chartUsers">
        <canvas id="testChart3"></canvas>
      </div>
      <div class="chart-mini" name="chartMails">
        <canvas id="testChart4"></canvas>
      </div>
    </div>
    <div class="chart-one-row" name="chartItemsByColors">
      <canvas id="testChart"></canvas>
    </div>
  </section>  

@endsection

@push('page-scripts')
    @vite(['resources/js/charts.js'])
@endpush

@push('js')
<script>
  //for chart ItemsByColors
  const colorsCh = @json($colorsCh);

  const itemsWithColors = @json($itemsWithColors);

  const colorsWithItems = @json($colorsWithItems);

  let colorsNum = colorsWithItems.length;
  console.log('colorsNum = ' + colorsNum);

  let colorsItems = [];
  let colorsItemsStr = [];

  for (let i=0; i < colorsNum; i++) {
    let itemsNum = 0;
    for (let j=0; j < itemsWithColors.length; j++) {
      if (itemsWithColors[j].colors.length !== 0) {
        for (let k=0; k < itemsWithColors[j].colors.length; k++) {
          if (itemsWithColors[j].colors[k].id === colorsWithItems[i].id) {
            itemsNum++;
          }
        }
      }
    }
    colorsItems[i] = itemsNum;
  }

  for (let i=0; i < colorsItems.length; i++) {
    colorsItemsStr[i] = colorsItems[i].toString();
  }



  // for chart ItemsByStatus
  let itemsDraft = [];
  let itemsActive = [];
  let itemsClose = [];

  let sumItemsDraft = 0;
  let sumItemsActive = 0;
  let sumItemsClose = 0;

  const itemsString = @json($itemsString);

  for (let i=0; i<itemsString.length; i++) {
    switch (itemsString[i]) {
      case 'draft':
        itemsDraft.push(1);
        break;
      case 'active':
        itemsActive.push(1);
        break;
      case 'close':
        itemsClose.push(1);
        break;
    }
  }

  itemsDraft.forEach(item => {
    sumItemsDraft += item;
  });
  itemsActive.forEach(item => {
    sumItemsActive += item;
  });
  itemsClose.forEach(item => {
    sumItemsClose += item;
  });

  //for chart CategoriesByStatus
  const categoriesCh = @json($categoriesCh);
  const categoriesString = @json($categoriesString);
  let categoriesStr = [];
  for (let i=0; i<categoriesString.length; i++) {
    switch (categoriesString[i]) {
      case 'draft':
        categoriesStr[i] = '1';
        break;
      case 'active':
        categoriesStr[i] = '2';
        break;
      case 'close':
        categoriesStr[i] = '3';
        break;
    }
  }
  console.log(categoriesStr);

  //for chart UsersByRole
  let usersGuest = [];
  let usersAdmin = [];

  let sumUsersGuest = 0;
  let sumUsersAdmin = 0;

  const usersString = @json($usersString);

  for (let i=0; i<usersString.length; i++) {
    switch (usersString[i]) {
      case 'guest':
        usersGuest.push(1);
        break;
      case 'admin':
        usersAdmin.push(1);
        break;
    }
  }

  usersGuest.forEach(item => {
    sumUsersGuest += item;
  });
  usersAdmin.forEach(item => {
    sumUsersAdmin += item;
  });


  //for chart MailsByStatus
  let mailsDraft = [];
  let mailsActive = [];
  let mailsClose = [];

  let sumMailsDraft = 0;
  let sumMailsActive = 0;
  let sumMailsClose = 0;

  const mailsString = @json($mailsString);
  console.log(mailsString);
  
 
  for (let i=0; i<mailsString.length; i++) {
    switch (mailsString[i]) {
      case 'draft':
        mailsDraft.push(1);
        break;
      case 'active':
        mailsActive.push(1);
        break;
      case 'close':
        mailsClose.push(1);
        break;
    }
  }

  mailsDraft.forEach(item => {
    sumMailsDraft += item;
  });
  mailsActive.forEach(item => {
    sumMailsActive += item;
  });
  mailsClose.forEach(item => {
    sumMailsClose += item;
  });

  //console.log(sumMailsActive);



</script>
@endpush
