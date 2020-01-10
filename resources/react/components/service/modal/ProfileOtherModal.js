import React, { useState } from 'react';
import { useDispatch } from 'react-redux';

import BaseModal from './BaseModal';
import Button from '../../common/Button';
import Radio from '../../common/Radio';

const ProfileOtherModal = _ => {
  const dispatch = useDispatch(); // TODO on other events
  const [formValues, setFormValues] = useState({
    item1: '',
    item2: '',
    item3: '',
    item4: '',
    item5: '',
    item6: '',
    item7: '',
    item8: '',
    item9: '',
  });

  const toggleChange = e => { // TODO, buggy return
    e.persist();

    setFormValues(prevState => {
      return { ...prevState, [e.target.name]: e.target.value }
    });
  }

  return (
    <BaseModal title="その他">
      <div className="modal__content">
        <form className="modal__form" onSubmit={_ => console.log('Submit programming')}>
          <ul className="modal__form-table">
            <li className="modal__form-table-item modal__form-table-item--header">
              <div className="modal__form-table-item-wrapper">
                <span className="modal__form-table-item-label"></span>
                <span className="modal__form-table-item-label">なし</span>
                <span className="modal__form-table-item-label">半年以内</span>
                <span className="modal__form-table-item-label">1年以内</span>
                <span className="modal__form-table-item-label">1年以上</span>
                <span className="modal__form-table-item-label">２年以上</span>
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Linux
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item1a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1b"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1c"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1d"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item1e"
                  onChange={e => toggleChange(e)}
                  name="item1"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Mac OS X
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item2a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2b"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2c"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2d"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item2e"
                  onChange={e => toggleChange(e)}
                  name="item2"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Cent OS
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item3a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3b"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3c"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3d"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item3e"
                  onChange={e => toggleChange(e)}
                  name="item3"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Debian
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item4a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4b"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4c"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4d"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item4e"
                  onChange={e => toggleChange(e)}
                  name="item4"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Apache
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item5a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5b"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5c"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5d"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item5e"
                  onChange={e => toggleChange(e)}
                  name="item5"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  nginx
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item6a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6b"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6c"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6d"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item6e"
                  onChange={e => toggleChange(e)}
                  name="item6"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Unicorn
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item7a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item7"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item7b"
                  onChange={e => toggleChange(e)}
                  name="item7"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item7c"
                  onChange={e => toggleChange(e)}
                  name="item7"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item7d"
                  onChange={e => toggleChange(e)}
                  name="item7"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item7e"
                  onChange={e => toggleChange(e)}
                  name="item7"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Amazon Web Service
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item8a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item8"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item8b"
                  onChange={e => toggleChange(e)}
                  name="item8"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item8c"
                  onChange={e => toggleChange(e)}
                  name="item8"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item8d"
                  onChange={e => toggleChange(e)}
                  name="item8"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item8e"
                  onChange={e => toggleChange(e)}
                  name="item8"
                  type="radio"
                />
              </div>
            </li>
            <li className="modal__form-table-item">
              <div className="modal__form-table-item-wrapper">
                <div className="modal__form-table-item-key">
                  Vim
                </div>
                <Radio className="modal__form-table-item-value"
                  value="item9a"
                  checked={true}
                  onChange={e => toggleChange(e)}
                  name="item9"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item9b"
                  onChange={e => toggleChange(e)}
                  name="item9"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item9c"
                  onChange={e => toggleChange(e)}
                  name="item9"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item9d"
                  onChange={e => toggleChange(e)}
                  name="item9"
                  type="radio"
                />
                <Radio className="modal__form-table-item-value"
                  value="item9e"
                  onChange={e => toggleChange(e)}
                  name="item9"
                  type="radio"
                />
              </div>
            </li>
          </ul>
        </form>
        <div className="modal__actions">
          <Button className="button--icon">
            <>
              <i className="icon icon-disk"></i>
              セーブ
            </>
          </Button>
        </div>
      </div>
    </BaseModal>
  )
}

export default ProfileOtherModal;
