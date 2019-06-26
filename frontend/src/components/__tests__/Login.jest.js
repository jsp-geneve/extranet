/* @jest-environment jsdom */
/* eslint-env jest */

import { mount, createLocalVue } from '@vue/test-utils'
import Login from '../Login.vue'
import { Quasar } from 'quasar'

import { components } from './helpers.js'

describe('Login component', () => {
  const localVue = createLocalVue()
  localVue.use(Quasar, { components }) // , lang: langEn

  it('passes the sanity check and creates a wrapper', () => {
    const wrapper = mount(Login, {
      localVue
    })

    expect(wrapper.isVueInstance()).toBe(true)
  })

  it('called Apollo mutation in login() method', async () => {
    const mutate = jest.fn()
    const wrapper = mount(Login, {
      localVue,
      mocks: {
        $apollo: {
          mutate,
        },
      },
    })

    await wrapper.vm.login()

    expect(mutate).toBeCalled()
  })
})
