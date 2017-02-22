// @flow
import * as types from '../actions/action-types'

const initialState = {
  color: '#1B54FD',
}

export default function color(state: Object = initialState, action: Object = {}) {
  switch (action.type) {
    case types.CHANGE_COLOR:
      return {
        ...state,
        color: action.color,
      }
    default:
      return state
  }
}
