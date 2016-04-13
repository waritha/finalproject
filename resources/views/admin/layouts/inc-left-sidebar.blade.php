<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
<ul class="nav" id="side-menu">


<li>
<a href="{{url('datastudent')}}"><i class="fa fa-bar-chart-o fa-fw"></i> ข้อมูลนักศึกษา<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li>
<a href="{{url('studentform')}}">เพิ่มข้อมูลนักศึกษา<span class="fa arrow"></span></a>
<ul class="nav nav-third-level">
<li>
<a href="{{url('studentform')}}">เพิ่มรายคน</a>
</li>
<li>
<a href="{{url('admin/dataexcel')}}">เพิ่มหลายๆ คนจากเอ็กเซล(Excel)</a>
</li>
</ul>
</li>
<li>
<a href="{{url('datastudent')}}">แก้ไข/ค้นหา</a>
</li>
</ul>
</li>

<li>
<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> ข้อมูลกิจกรรม<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li>
<a href="{{url('datage_activity')}}">กิจกรรม(GE)<span class="fa arrow"></span></a>
<ul class="nav nav-third-level">
<li>
<a href="{{url('geform')}}">เพิ่มกิจกรรม(GE)</a>
</li>
<li>
<a href="{{url('datage_activity')}}">แก้ไข/ค้นหากิจกรรม(GE)</a>
</li>
</ul>
</li>
<li>
<a href="#">กิจกรรมที่จัดจริง<span class="fa arrow"></span></a>
<ul class="nav nav-third-level">
<li>
<a href="{{url('actform')}}">เพิ่มกิจกรรมที่จัดจริงและจับคู่กิจกรรม(GE)</a>
</li>
<li>
<a href="{{url('data_activity')}}">แก้ไขกิจกรรมที่จัดจริงและจับคู่กิจกรรม(GE)</a>
</li>
</ul>
</li>
</ul>
</li>


<li>
<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> การเข้าร่วมกิจกรรมจริง<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li>
<a href="{{url('data_participation')}}">การลงชื่อกิจกรรม</a>
</li>
<!-- <li>
<a href="{{url('admin/joinact')}}">แก้ไข/ค้นหา</a>
</li> -->
</ul>
</li>


<li>
<a href="#"><i class="glyphicon glyphicon-print"></i> รายงาน<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
<li>
<a href="{{url('report_student')}}">รายงานนักศึกษาต่อบุคคล</a>
</li>
<li>
<a href="{{url('report_activity')}}">รายงานกิจกรรม</a>
</li>
<li>
<a href="{{url('report_conclude')}}">รายงานสรุป</a>
</li>
</ul>
</li>


<li>
<a href="{{url('setting')}}"><i class="fa fa-gear fa-fw"></i> ตั้งค่า</a>
</li>


</ul>
</div>
</div>
