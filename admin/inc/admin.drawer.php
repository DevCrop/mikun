<?php


$restrictedMenuKeys = $role->getRestrictedMenuKeys();

$BASE_URL = '/admin/pages/';

$gnbActive = array_fill(1, 11, "");
$pageActive = [];
$pagenum = $pagenum ?? 0;

// 메뉴 정의
$menus = [
    1 => [
        'key' => 'dashboard',
        'title' => '대시보드',
        'icon' => 'fa-grid-2',
        'url'  => '/admin/main.php',
        'subs' => []
    ],
    2 => [
        'key' => 'board',
        'title' => '게시판',
        'icon' => 'fa-list',
        'subs' => [
            ['title' => '게시글 관리', 'url' => 'board/board.list.php'],
        ]
    ],
    3 => [
        'key' => 'design',
        'title' => '디자인',
        'icon' => 'fa-paint-roller',
        'subs' => [
            ['title' => '배너 관리', 'url' => 'design/banner.list.php'],
            ['title' => '팝업 관리', 'url' => 'design/popup.list.php'],
        ]
    ],
    4 => [
        'key' => 'facility',
        'title' => '시설 관리',
        'icon' => 'fa-hospital',
        'url'  => '/admin/pages/facility/index.php',
        'subs' => []
    ],
    5 => [
        'key' => 'doctor',
        'title' => '의료진 관리',
        'icon' => 'fa-user-doctor',
        'url'  => '/admin/pages/doctor/index.php',
        'subs' => []
    ],
    6 => [
        'key' => 'nonpay',
        'title' => '비급여 항목 관리',
        'icon' => 'fa-receipt',
        'url'  => '/admin/pages/nonpay/index.php',
    ],
    7 => [
        'key' => 'faq',
        'title' => 'FAQ 관리',
        'icon' => 'fa-clipboard-question',
        'url'  => '/admin/pages/faq/index.php',
    ],
    8 => [
        'key' => 'account',
        'title' => '계정 관리',
        'icon' => 'fa-user-gear',
        'url'  => '/admin/pages/account',
    ],
    9 => [
        'key' => 'user',
        'title' => '회원 관리',
        'icon' => 'fa-users',
        'url'  => '/admin/pages/member',
    ],
    10 => [
        'key' => 'setting',
        'title' => '사이트 정보관리',
        'icon' => 'fa-globe',
        'subs' => [
            ['title' => '사이트 정보 관리', 'url' => 'setting/index.php'],
            ['title' => '사이트 외부 스크립트 관리', 'url' => 'setting/external.tag.php'],
            ['title' => '페이지별 SEO 관리', 'url' => 'setting/seo.php'],
        ]
    ],
    11 => [
        'key' => 'inquiry',
        'title' => '문의 관리',
        'icon' => 'fa-envelope-open-text',
        'subs' => [
            ['title' => '간편 문의', 'url' => 'inquiry/simple.php'],
            ['title' => '공진단 · 상담 문의', 'url' => 'inquiry/herb.php'],
            ['title' => '예진표 (맞춤한약)', 'url' => 'inquiry/prescription.php'],
        ]
    ],
     12 => [
        'key' => 'etcs',
        'title' => '기타 관리',
        'icon' => 'fa-circle-info',
        'url'  => '/admin/pages/etcs',
    ],
	  13 => [
        'key' => 'log',
        'title' => '접속 통계',
        'icon' => 'fa-chart-simple',
		'subs' => [
            ['title' => '일별', 'url' => 'log/log.day.php'],
            ['title' => '시간별 · 상담 문의', 'url' => 'log/log.time.php'],
            ['title' => '월별 ', 'url' => 'log/log.month.php'],
			['title' => '연별', 'url' => 'log/log.year.php'],
        ]
    ],
];

// 메뉴 활성화 설정 함수
function setActive(&$gnbActive, &$pageActive, $depth, $page, $gnbIndex, $key, $subCount = 0) {
    $gnbActive[$gnbIndex] = "active";

    if ($subCount > 0) {
        $pageActive[$key] = array_fill(0, $subCount, "");
        if ($page > 0 && $page <= $subCount) {
            $pageActive[$key][$page - 1] = "active";
        }
    }
}

// 현재 페이지 정보로 활성화 설정
if (isset($menus[$depthnum])) {
    $menu = $menus[$depthnum];
    $subCount = isset($menu['subs']) && is_array($menu['subs']) ? count($menu['subs']) : 0;
    setActive($gnbActive, $pageActive, $depthnum, $pagenum, $depthnum, $menu['key'], $subCount);
}
?>

<aside class="no-sidebar">
    <h1 class="no-sidebar-logo">
        <a href="<?=$NO_IS_SUBDIR?>/admin/pages/board/board.list.php">
            <img src="<?=$NO_IS_SUBDIR?>/resource/images/admin/logo.png" class="no-logo--default" />
            <img src="<?=$NO_IS_SUBDIR?>/resource/images/admin/logo-sm.png" class="no-logo--sm" />
        </a>
        <div class="no-sidebar-toggle"><span><i class="bx bx-chevrons-left"></i></span></div>
    </h1>

    <div class="no-sidebar-menu">
        <nav class="no-sidebar-menu__inner">
            <ul class="no-menu-list">
                <?php foreach ($menus as $index => $menu): ?>
                <?php
                        if (in_array($menu['key'], $restrictedMenuKeys)) continue;
                        $hasSub = !empty($menu['subs']);
                    ?>
                <li class="no-menu-item <?=$gnbActive[$index] ?? ''?>">
                    <?php if ($hasSub): ?>
                    <span class="no-menu-link">
                        <span class="no-menu-icon"><i class="fa-solid <?=$menu['icon']?>"></i></span>
                        <span class="no-menu-title"><?=$menu['title']?></span>
                        <span class="no-menu-arrow"><i class="bx bx-chevron-down"></i></span>
                    </span>
                    <ul class="no-menu-sub">
                        <?php foreach ($menu['subs'] as $i => $sub): ?>
                        <?php
                                        $subUrl = $BASE_URL . $sub['url'];
                                        $isActive = $pageActive[$menu['key']][$i] ?? '';
                                    ?>
                        <li class="no-menu-item">
                            <a href="<?=$NO_IS_SUBDIR . $subUrl?>" class="no-menu-link <?=$isActive?>">
                                <span class="no-menu-bullet"><span class="no-menu-bullet-dot"></span></span>
                                <span class="no-menu-title"><?=$sub['title']?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                    <a href="<?=$menu['url']?>" class="no-menu-link">
                        <span class="no-menu-icon"><i class="fa-solid <?=$menu['icon']?>"></i></span>
                        <span class="no-menu-title"><?=$menu['title']?></span>
                    </a>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</aside>

<script defer>
const activatedMenu = document.querySelector('.no-menu-item.active .no-menu-arrow');
if (activatedMenu) activatedMenu.classList.add('open');
</script>