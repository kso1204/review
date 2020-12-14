# Review

1. Review사이트 만들기
2. 음식, 문화생활, 여행..? 등 태그를 나누어서 기록하기
3. window10 + docker + laravel + vue

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

# 개발 

# Day - 1

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

