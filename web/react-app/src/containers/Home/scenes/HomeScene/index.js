// @flow
import React, { Component } from 'react'
import { connect } from 'react-redux'
import styled from 'styled-components'

import Nav from '../../../../components/Nav'
import Bubble from '../../../../components/Bubble'
import Swatches from '../../../../components/Swatches'
import Toggler from '../../../../components/Toggler'
import Card from '../../../../components/Card'
import Small from '../../../../components/Small'
import * as colorActions from '../../../../actions/colorActions'
import background from '../../../../assets/background.jpg'
import data from './data'

const Container = styled.div`
  background-image: url('${props => props.background}');
  background-repeat: repeat;
`

const StyledSwatches = styled(Swatches)`
  position: absolute;
  right: 0;

`
const Filter = styled.div`
  display: flex;
  flex-flow: column;
  width: 13.0625rem;
  position: relative;
  background-color: white;
  border: 2px solid #FFFFFF;
  box-shadow: 2px 2px 7px 0 rgba(0,0,0,0.36);
  padding: 1rem;
`

const FilterSection = styled.h3`
  font-size: .875rem;
  position: relative;
  text-align: center;
  &::after {
    content: '';
    position: absolute;
    bottom: -1rem;
    left: 50%;
    transform: translateX(-50%);
    width: 10%;
    height: 2px;
    background-color: black;
  }
`

const Togglers = styled.div`
  display: flex;
  flex-flow: row wrap;
  justify-content: space-around;
  width: 80%;
  margin: auto;
`

const NewFlats = styled.div`
  display: flex;
  flex-flow: row nowrap;
  margin-left: 1rem;
  overflow: scroll;
  padding-bottom: 1rem;
`
const HorizontalAds = styled.div`
  margin-top: 2rem;
  display: flex;
  flex-flow: row nowrap;
  overflow: scroll;
  > * {
    margin-left: 2rem;
    height: 10rem;
  }
`
const Trending = styled.div`
  display: flex;
  flex-flow: row wrap;
  max-width: 58.125rem;
  justify-content: space-around;
  margin: auto;
`

const InlineContainer = styled.div`
  display: flex;
  flex-flow: row nowrap;
`

const SearchButton = styled.div`
  display: flex;
  flex-flow: row;
  justify-content: center;
  align-items: center;
  min-height: 2rem;
  background: white;
  border: 1px solid ${props => props.color};
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.19);
  border-radius: 5px;
  font-size: 1rem;
  color: ${props => props.color};
  letter-spacing: 0;
  transition: all .3s ease;
  cursor: pointer;
  margin-top: 1rem;
  &:hover {
    background-color: ${props => props.color};
    color: white;
  }
`
const Crementer = styled.div`
  display: flex;
  justify-content: center;
  align-content: center;
  border: 1px solid black;
  font-size: .875rem;
  color: black;
  letter-spacing: 0;
  border-radius: 50%;
  width: 1.5rem;
  height: 1.5rem;
  cursor: pointer;
  margin-right: .7rem;
`


class HomeScene extends Component {
  constructor(props) {
    super(props)
    this.state = {
      alphName: 'None',
      japName: 'None',
      x: 0,
      y: 0,
      filters: {
        room: '',
        area: '',
        region: '',
        child: 0,
        adults: 0,
      }
    }
  }
  onHoverRegion(region, japName){
    const { top, left, width } = this.refs[region].getBoundingClientRect()
    const x = left + width / 2
    const y = top
    this.setState({x, y, alphName: region.charAt(0).toUpperCase() + region.slice(1), japName})
  }

  onChangeRegion(region){
    this.setState({ alphName: region })
    this.setState(() => ({filters: {...this.state.filters, region}}))
  }

  changeRoom(index){
    this.setState(() => ({filters: {...this.state.filters, room: index}}))
  }

  changeArea(index){
    this.setState(() => ({filters: {...this.state.filters, area: index}}))
  }
  crementAdults(sign){
    console.log(sign);
    if (sign === '+') {
      this.setState(() => ({filters: {...this.state.filters, adults: this.state.filters.adults + 1}}))
    } else {
      this.setState(() => ({filters: {...this.state.filters, adults: this.state.filters.adults - 1}}))
    }
  }
  crementChild(sign){
    if (sign === '+') {
      this.setState(() => ({filters: {...this.state.filters, child: this.state.filters.child + 1}}))
    } else {
      this.setState(() => ({filters: {...this.state.filters, child: this.state.filters.child - 1}}))
    }
  }
  logForm() {
    const { room, area, region, child, adults } = this.state.filters
    const minPrice = this.minPrice.value
    const maxPrice = this.maxPrice.value
    console.table([
      {room: data.filters.rooms[room]},
      {area: data.filters.areas[area]},
      {region},
      {child},
      {adults},
      {minPrice},
      {maxPrice}
    ])
  }

  render() {
    const { color } = this.props.color
    const { japName, alphName, x, y, filters } = this.state
    return (
      //        <Nav />

      <Container background={background}>
        <StyledSwatches />
        <InlineContainer>
          <Filter>
            <FilterSection>Voyageurs</FilterSection>
            <InlineContainer>
              <Crementer onClick={() => this.crementAdults('-')}>-</Crementer>
              <Crementer onClick={() => this.crementAdults('+')}>+</Crementer>
              <div>{filters.adults} Adulte{filters.adults > 0 ? 's' : ''}</div>
            </InlineContainer>
            <InlineContainer>
              <Crementer onClick={() => this.crementChild('-')}>-</Crementer>
              <Crementer onClick={() => this.crementChild('+')}>+</Crementer>
              <div>{filters.child} Enfant{filters.child > 0 ? 's' : ''}</div>
            </InlineContainer>
            <FilterSection>Nombre de pièces</FilterSection>
            <Togglers>
              {data.filters.rooms.map((room, index) => (
                <Toggler
                  key={index}
                  index={index}
                  color={color}
                  value={filters.room === index ? 1 : 0}
                  onClick={() => this.changeRoom(index)}
                >
                  { room }
                </Toggler>
              ))}
            </Togglers>
            <FilterSection>Superficié m2</FilterSection>
            <Togglers>
            {data.filters.areas.map((area, index) => (
              <Toggler
                key={index}
                index={index}
                color={color}
                value={filters.area === index ? 1 : 0}
                onClick={() => this.changeArea(index)}
                >
                  { area }
                </Toggler>
              ))}
            </Togglers>
            <FilterSection>Prix</FilterSection>
            <label htmlFor="min-price">Prix min:</label>
            <input type="number" step="100" defaultValue="30000" ref={(input) => { this.minPrice = input}} id="min-price"/>
            <label htmlFor="max-price">Prix max:</label>
            <input type="number" step="100" defaultValue="1000000" ref={(input) => { this.maxPrice = input}} id="max-price"/>
            <FilterSection>Region</FilterSection>
            <div>{filters.region.length === 0 ? 'Choisissez une région sur la carte' : filters.region }</div>
            <SearchButton color={color} onClick={() => this.logForm()}>Rechercher</SearchButton>
          </Filter>
          <Bubble alphName={alphName} japName={japName} color={color} x={x} y={y}/>
          <svg width="606" height="398" viewBox="0 0 606 398">
            <g transform="translate(-2)" fill={color} fillRule="evenodd">
              {/* <rect ref="ile" onClick={() => this.onChangeRegion('ile')} onMouseOver={() => this.onHoverRegion('ile', 'Ile seule')} transform="rotate(-46 20.533 379.517)" x="2.136" y="369.02" width="36.793" height="20.995" rx="5"/> */}
              <path ref="hokkaido" onClick={() => this.onChangeRegion('hokkaido')} onMouseOver={() => this.onHoverRegion('hokkaido', 'Hokkaidō')} d="M477.455 96.576v12.84c0 2.764-2.24 5.005-5 5.005h-15.23c-2.762 0-5-2.244-5-5.004V22.85c0-1.38.56-2.632 1.465-3.538.9-.906 2.15-1.466 3.535-1.466h23.384V5.006c0-2.765 2.236-5.006 4.998-5.006h87.766c2.762 0 5 2.234 5 5.006v12.84h24.434c2.762 0 5 2.235 5 5.007v15.18c0 .46-.062.908-.178 1.333.116.425.18.872.18 1.333v50.868c0 2.766-2.247 5.008-5.006 5.008h-125.35z"/>
              <path ref="tohoku" onClick={() => this.onChangeRegion('tohoku')} onMouseOver={() => this.onHoverRegion('tohoku', 'Tōhoku')} d="M540.53 196.828V123.62c0-2.762-2.24-5-5.005-5H458.28c-2.76 0-5.004 2.24-5.004 5v82.378c0 2.762 2.24 5 5.005 5h24.43v28.588c0 2.762 2.242 5.003 5.006 5.003h47.81c2.772 0 5.003-2.24 5.003-5.004v-42.758z"/>
              <path ref="kanto" onClick={() => this.onChangeRegion('kanto')} onMouseOver={() => this.onHoverRegion('kanto', 'Kantō')} d="M491.12 315.97h-3.153v19.153c0 2.757-2.24 4.992-5 4.992h-9.717v18.095c0 2.76-2.23 5-5.01 5h-11.006c-2.766 0-5.01-2.24-5.01-5v-54.836h-5.513c-2.76 0-4.997-2.24-4.997-5v-44.585c0-2.763 2.237-5.002 4.998-5.002h61.49c2.76 0 4.997 2.242 4.997 5v103.374c0 2.76-2.238 4.998-5.01 4.998H496.13c-2.766 0-5.01-2.246-5.01-4.998v-41.19z"/>
              {/* <path ref="none" onClick={() => this.onChangeRegion('none')} onMouseOver={() => this.onHoverRegion('none', 'None')} d="M402.817 331.717V285.28c0-2.767-2.24-5-5-5h-15.23c-2.76 0-5 2.238-5 5v32.855c-.26-.042-.53-.064-.803-.064h-25.727c-2.772 0-5.007 2.24-5.007 5v55.086c0 2.758 2.242 4.998 5.007 4.998h25.727c2.772 0 5.008-2.238 5.008-4.998V362.16h61.236c2.76 0 4.992-2.236 4.992-4.993V336.71c0-2.754-2.235-4.993-4.992-4.993h-40.21z"/> */}
              <path ref="chubu" onClick={() => this.onChangeRegion('chubu')} onMouseOver={() => this.onHoverRegion('chubu', 'Chūbu')} d="M361.818 247.738H345.79c-2.748 0-4.997 2.24-4.997 5.006v3.392H327.92c-2.76 0-4.998 2.24-4.998 5.002v8.892c0 2.76 2.238 5 4.998 5h79.102v48.54c0 1.383.56 2.633 1.464 3.537.907.9 2.16 1.46 3.542 1.46h30.985c2.774 0 5.007-2.238 5.007-5v-10.992c0-2.755-2.242-5.002-5.007-5.002h-5.505V243.54H473.5c2.774 0 5.006-2.238 5.006-5v-18.34c0-2.754-2.24-5.002-5.006-5.002h-82.247v-10.748c0-2.76-2.236-4.998-4.993-4.998h-19.45c-2.755 0-4.992 2.238-4.992 4.998v43.29zm42.05-46.433c0-2.764 2.242-5.004 5-5.004h5.768c2.762 0 5 2.24 5 5.005v3.64c0 2.762-2.242 5.003-5 5.003h-5.768c-2.76 0-5-2.24-5-5.004v-3.64z"/>
              <rect ref="chugoku" onClick={() => this.onChangeRegion('chugoku')} onMouseOver={() => this.onHoverRegion('chugoku', 'Chūgoku')} x="183.107" y="257.186" width="76.741" height="69.283" rx="5"/>
              <rect ref="shikoku" onClick={() => this.onChangeRegion('shikoku')} onMouseOver={() => this.onHoverRegion('shikoku', 'Shikoku')} x="184.159" y="331.717" width="105.124" height="51.437" rx="5"/>
              <path ref="kansai" onClick={() => this.onChangeRegion('kansai')} onMouseOver={() => this.onHoverRegion('kansai', 'Kansaï')} d="M266.155 290.777v-27.54c0-2.763 2.247-5 5.01-5h41.492c2.766 0 5.01 2.237 5.01 5v17.043h49.667c2.76 0 4.997 2.246 4.997 5v24.64c0 2.763-2.24 5-4.996 5h-26.54v64.284c0 2.762-2.232 5-4.995 5h-36.267c-2.758 0-4.994-2.236-4.994-5V326.47h-23.386c-2.76 0-5-2.243-5-4.996v-7.856c0-.654.127-1.278.355-1.85-.23-.57-.355-1.195-.355-1.847v-19.143z"/>
              <path ref="kyushu" onClick={() => this.onChangeRegion('kyushu')} onMouseOver={() => this.onHoverRegion('kyushu', 'Kyūshū')} d="M71.277 262.087c.028-2.756 2.298-4.99 5.055-4.99h94.106c2.764 0 5.004 2.24 5.004 4.997v115.99c0 2.76-2.243 4.997-4.998 4.997H127.05c-2.76 0-4.998-2.228-4.998-4.99V317.5c0-2.757-2.237-4.99-5-4.99h-41.29c-2.76 0-4.977-2.242-4.95-4.992l.465-45.43z"/>
            </g>
          </svg>
        </InlineContainer>
      </Container>
    )
  }
}




const mapStateToProps = ({ color }) => ({ color })
const mapDispatchToProps = { ...colorActions }

export default connect(mapStateToProps, mapDispatchToProps)(HomeScene)
