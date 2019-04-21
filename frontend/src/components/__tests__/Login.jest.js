/* @jest-environment jsdom */
/* eslint-env jest */

import { mount, createLocalVue } from '@vue/test-utils'
import Login from '../Login.vue'
import * as All from 'quasar'
const { Quasar } = All

const components = Object.keys(All).reduce((object, key) => {
  const val = All[key]
  if (val && val.component && val.component.name != null) {
    object[key] = val
  }
  return object
}, {})

describe('Login component', () => {
  const localVue = createLocalVue()
  localVue.use(Quasar, { components }) // , lang: langEn

  it('passes the sanity check and creates a wrapper', () => {
    const wrapper = mount(Login, {
      localVue
    })

    expect(wrapper.isVueInstance()).toBe(true)
  })

  it('called Apollo mutation in onSubmit() method', () => {
    const mutate = jest.fn()
    const wrapper = mount(Login, {
      localVue,
      mocks: {
        $apollo: {
          mutate,
        },
      },
    })

    wrapper.vm.onSubmit()

    expect(mutate).toBeCalled()
  })
})
