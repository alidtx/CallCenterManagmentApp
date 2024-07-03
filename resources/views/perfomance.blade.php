<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Daily Perfomance</p>
                <h5 class="font-weight-bolder mb-0">
                   {{$totalDailyUsersLeads ? $totalDailyUsersLeads: '0'}}/<span class="text-success text-center text-sm font-weight-bolder">{{ $dailyPercentage ? $dailyPercentage : '0' }}%</span>
                </h5>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Weekly Perfomance</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $TotalUserLeads ? $TotalUserLeads: '0' }}/<span class="text-success text-sm font-weight-bolder">{{ $weeklyPercentage ? $weeklyPercentage : '0' }}%</span>
                </h5>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Monthly Perfomance</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $monthlyTotalUserLeads ? $monthlyTotalUserLeads : '0'  }}/<span class="text-danger text-sm font-weight-bolder">{{ $monthlyPercentage ? $monthlyPercentage : '0' }}%</span>
                </h5>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Monthly Rank</p>
                <h5 class="font-weight-bolder mb-0">
                  {{-- {{ $rank ? $rank : 'Not Found'  }} --}}
                  <span class="text-success text-sm font-weight-bolder">Position</span>
                </h5>
              </div>
            </div>
            <div class="col-3 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>