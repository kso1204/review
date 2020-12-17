# Review

1. Review사이트 만들기
2. 음식, 문화생활, 여행..? 등 태그를 나누어서 기록하기
3. window10 + docker + laravel + vue
4. 태그를 등록할 수 있는 관리자 페이지를 하나 설정하고
5. 태그의 서브태그를 등록할 수 있는 페이지를 설정해보기


# 초기셋팅

1. src 폴더에서 laravel new review
2. nginx 폴더에서 project_3.test 설정하기
3. hosts 파일에 project_3.test 주소 설정
4. winpty docker-compose exec php sh
5. php artisan key:generate
6. localhost:8080으로 들어가서 phpMyAdmin으로 review DB 생성하기
7. .env파일에서 DB연결
8. git repository 생성하고 readme파일 만들고 remote연결
9. composer install
10. composer require laravel/ui
11. npm install
12. npm install vue
13. npm install vuex
14. php artisan ui vue --auth 
15. npm run watch 이 명령어를 입력해야 webpack 통해서 laravel + vue 내장 ui가 보여진다. 
16. cross-env error
17. npm install cross-env
18. lodash error
19. npm install lodash --save
20. npm install 
21. npm run watch
22. php artisan migrate 하고 레지스터 후 로그인
23. ~npm install tailwindcss~
24. tailwindcss 오류 npm uninstall tailwindcss
25. npm install tailwindcss@compat
26. npx tailwindcss init (https://stackoverflow.com/questions/64925926/error-postcss-plugin-tailwindcss-requires-postcss-8)
27. npm install --save vue-router
28. npm install view-design --save
# 개발 

# Day 1

frontend를 blade파일이 아닌 vue로 구성할 예정이므로.. vue 셋팅
 
laravel ui를 사용하게 되면 register / login이 이용 가능한데 

auth를 이용해 login을 하게 되면 home 화면으로 이동한다.

이 home 화면을 vue의 기본화면으로 잡고 

home.blade.php의 내용을 

```
@extends('layouts.app')

@section('content')
    <App></App>
@endsection
```

수정한다. 

이러한 방법으로 App.vue의 내용을 가져오게 되는데

App.vue의 내용은

```
<template>
    <div>
        <h1>App First</h1>
    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>

</style>
```

이런 vue화면을 보여주기 위해서는 app.js를 수정해야 한다.

```
import Vue from 'vue';
import App from './components/App';

require('./bootstrap');

Window.Vue = require('vue');


Vue.component('App', require('./components/App.vue').default)

const app = new Vue({
    el: "#app"
});
```

위와같이 설정하고 npm run watch 

![image](https://user-images.githubusercontent.com/6989005/102061298-a1e18680-3e36-11eb-8bf1-da82cabc6002.png)

화면이 보이게 된다.

이 부분을 태그를 등록하는 Page로 변환해보자 CSS는.. 최대한 마지막에 건드리는걸로..

왼쪽에 메뉴 탭 설정하고 오른쪽에 해당 리스트 보여주는 전형적인 사이트로 구현


# Day 2

Facebook clone coding 영상을 보면서 만들었던 메뉴와 탭 형식을 이용해보기

![image](https://user-images.githubusercontent.com/6989005/102155114-3511cf00-3ebe-11eb-965f-80d99af107d7.png)

tailwindcss가 정상적으로 먹히지 않음..

![image](https://user-images.githubusercontent.com/6989005/102159671-54612a00-3ec7-11eb-8a75-9f141cb27ecc.png)

tailwindcss가 정상적으로 적용된 상단 탭 모습

1. 태그 등록 페이지 구현 view-router사용

```
<template>
    <div class="bg-white h-full w-full border-r">
        <h1>MainTag Vue</h1>
    </div>
</template>

<script>
    export default {
        name : "MainTag",
    }
</script>
```

```
import Vue from 'vue';
import VueRouter from 'vue-router';
import MainTag from './components/MainTag';

Vue.use(VueRouter);

export default new VueRouter({
    mode : 'history',

    routes : [
        {
            path : '/mainTag', name : 'mainTag', component : MainTag
        }
    ]
})
```

```
import Vue from 'vue';
import router from './router';

require('./bootstrap');

Window.Vue = require('vue');


Vue.component('App', require('./components/App.vue').default)

const app = new Vue({
    el: "#app",
    router
});
```

router 추가

![image](https://user-images.githubusercontent.com/6989005/102173482-7023fa80-3ede-11eb-8ca0-b801991603ad.png)


![image](https://user-images.githubusercontent.com/6989005/102175487-022e0200-3ee3-11eb-839d-3e605a2edf9d.png)

view-design을 설치해서 가져왔더니 tailwindcss가 살짝 먹혔다.. 그래도 우선 진행

![image](https://user-images.githubusercontent.com/6989005/102191223-75903d80-3efc-11eb-85fd-190b26e07e6a.png)

개발은 꾸준히.. 안 하다가 뭔가 하려고 하니까 벌써부터 막힌다.. 테이블은  https://tailwindcomponents.com/component/responsive-table 여기서 줍줍

# Day 3

태그 등록 페이지를 구성 했으니, 태그를 등록하는 부분에 대한 api설정과 TDD 작업

php artisan make:test TagTest

vendor/bin/phpunit --filter testExample

```
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tag_create()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/tags', [
            'tagName' => 'Food',
        ])->assertStatus(201);

    }
}

```

route에 tags가 없다는 에러

```
Route::middleware('auth:api')->group(function () {

    Route::apiResources([
        '/tags' => TagController::class,
    ]);

});
```

controller에 TagControlle가 없다는 에러

벌써 막혔네;

태그는 관리자가 생성하는거라 auth:api에 대해 신경쓰지 않았는데, 이 부분을 그룹으로 묶어서 사용하게 되면

test에서 actingAs를 설정해줘야 한다.. 저 부분을 관리자로 바꾸고 나중에 권한을 줘서 사용하게 한다면 이게 맞는 것 같기도..

```
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tag_create()
    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create();

        $this->actingAs($user, 'api');

        $response = $this->post('/api/tags', [
            'tagName' => 'Food',
        ])->assertStatus(201);

    }
}
```

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function store()
    {
        return response([], 201); 
    }
}

```

test해보면 green이 나온다


# Day 4 

TagTest 내용

class TagController extends Controller
{
    //
    public function store()
    {
        $data = request()->validate([
            'data.attributes.tagName' => 'required',
        ]);
        
        $tag = Tag::create($data['data']['attributes']);

        return new TagResource($tag);
    }
}

이런식으로 추가 했는데.. 굳이 이렇게 해야 하나.. 이 부분에 대해서 다시 찾아봐야 할 것 같다.