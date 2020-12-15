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

