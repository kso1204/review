<template>

    <div class="bg-white h-full w-full border-r">

        <Modal 
        v-model="addModal"
        title="태그등록"
		:mask-closable = "false"
		:closable = "false"
		>

        
		<Input v-model="data.tagName" placeholder="Add Tag name..." />

       <div class="space">
    </div>
           

		 <div slot="footer">
			<Button type="error" @click="addModal=false">close</Button>
			<Button type="primary" @click="addTag" :disabled="isAdding" :loading="isAdding" >{{ isAdding? "Adding.." : "Add Tag" }}</Button>
		</div>
    </Modal>

        <div class="px-16 pt-16 flex">
              <Button @click="addModal=true"><Icon type="md-add" /> Add Tag</Button> 
        </div>
        <div class="px-16 pt-8  flex">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">태그이름</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">버튼</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-grey-lighter">
          <td class="py-4 px-6 border-b border-grey-light">음식</td>
          <td class="py-4 px-6 border-b border-grey-light">
            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">수정</a>
            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">삭제</a>
          </td>
        </tr>
      </tbody>
    </table>
        </div>
    </div>
</template>

<script>
    export default {
        name : "MainTag",

        data() {
            return {
                data : {
                    tagName: '',
                },
                addModal : false,
			    isAdding : false,
                tags : {},
            }
        }
    }
</script>